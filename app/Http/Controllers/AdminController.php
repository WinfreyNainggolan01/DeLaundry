<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Track;
use App\Models\Student;
use App\Models\Feedback;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    // Profile function
    public function admin_profile()
    {
        return view('admin.profile', [
            'title' => 'Profile Page',
        ]);
    }

    public function adminEditProfile(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'phone_number'  => 'required|string|max:15',
            'photo'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('photo') && $request->file('photo')->getSize() > 2048000) {
            return redirect()->back()->withErrors('The photo may not be greater than 2MB.');
        }
        
        $admin = Auth::guard('admin')->user();
        $admin = Admin::find($admin->id);

        $admin->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
        ]);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = date('Y-m-d') . '-' . $photo->getClientOriginalName();
            
            $photoPath = 'photo-admin/'.$photoName;

            if ($admin->photo && Storage::disk('public')->exists($admin->photo)) {
                Storage::disk('public')->delete($admin->photo);
            }

            Storage::disk('public')->put($photoPath, file_get_contents($photo));

            $admin->update([
                'photo' => $photoPath,
            ]);
        }
        return redirect()->back()->with('success', 'Profile updated successfully');
    }

    // dashboard function
    public function admin_dashboard()
    {
        $total_user = Student::count();
        $total_order = Order::count();
        $total_complaint = Complaint::count();
        $monthlyEarnings = Order::selectRaw('SUM(price) as total, MONTH(date_at) as month')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        return view('admin.dashboard', [
            'total_user'        => $total_user,
            'total_order'       => $total_order,
            'total_complaint'   => $total_complaint,
            'monthlyEarnings'   => $monthlyEarnings,
        ]);
    }

    public function admin_user()
    {
        return view('admin.user',[

            'students'      => Student::all(),
            'total_user'    => Student::count(),

        ]);
    }
    
    // order function
    public function admin_order()
    {
        $orders = Order::all();
        $total_order = Order::count();
        return view('admin.order', [
            'orders'        => $orders,
            'total_order'   => $total_order,
        ]);
    }

    public function admin_order_detail($ordx_id)
    {
        $order = Order::where('ordx_id', $ordx_id)->firstOrFail();
        $items = $order->items;

        $total_quantity = 0;
        foreach ($items as $item) {
            $total_quantity += $item['quantity'];
        }
        
        return view('admin.detail-order', [
            'order'             => $order,
            'items'             => $items,
            'total_quantity'    => $total_quantity,

        ]);
    }

    public function editOrder($ordx_id)
    {
        $order = Order::where('ordx_id', $ordx_id)->firstOrFail();
        return view('admin.edit-order', compact('order'));
    }
    
    public function admin_order_update(Request $request, $ordx_id)
    {
        $order = Order::where('ordx_id', $ordx_id)->firstOrFail();
        $weight = $request->weight;
        $price = $weight * 15000;
    
        $order->update([
            'status'    => $request->status,
            'weight'    => $weight,
            'price'     => $price,
        ]);

        // Masukkan pada Bill dengan bulan dan tahun yang sama dengan order
        $bill = Bill::where('student_id', $order->student_id)
        ->where('month', $order->date_at->format('Y-m'))
        ->first();
        
        $bill->update([
            'total_weight'  => $bill->total_weight + $weight,
            'total_amount'  => $bill->total_amount + $price,
        ]);

        // cari track order dengan order_id yang sama dengan order
        $track = Track::where('order_id', $order->id)->first();

        switch ($request->status) {
            case 'picked_up':
                $track->update([
                    'messages' => json_encode([
                        [
                            'status'        => 'picked_up',
                            'description'   => 'Order has been picked up',
                            'date_at'       => now()->setTimezone('Asia/Jakarta')->format('D, d M Y'),
                            'time_at'       => now()->setTimezone('Asia/Jakarta')->format('H:i') . ' WIB',
                        ],
                    ]),
                ]);
                break;
            case 'on_process':
                $track->update([
                    'messages' => json_encode([
                        [
                            'status'        => 'on_process',
                            'description'   => 'Order is being processed',
                            'date_at'       => now()->setTimezone('Asia/Jakarta')->format('D, d M Y'),
                            'time_at'       => now()->setTimezone('Asia/Jakarta')->format('H:i') . ' WIB',
                        ],
                    ]),
                ]);
                break;
            case 'delivered':
                $track->update([
                    'messages' => json_encode([
                        [
                            'status'        => 'delivered',
                            'description'   => 'Order has been delivered',
                            'date_at'       => now()->setTimezone('Asia/Jakarta')->format('D, d M Y'),
                            'time_at'       => now()->setTimezone('Asia/Jakarta')->format('H:i') . ' WIB',
                        ],
                    ]),
                ]);
                break;
            case 'done':
                $track->update([
                    'messages' => json_encode([
                        [
                            'status'        => 'done',
                            'description'   => 'Order has been done',
                            'date_at'       => now()->setTimezone('Asia/Jakarta')->format('D, d M Y'),
                            'time_at'       => now()->setTimezone('Asia/Jakarta')->format('H:i') . ' WIB',
                        ],
                    ]),
                ]);
                break;
        }

        return redirect()->route('admin_order')->with('success', 'Order updated successfully');
    }

    public function showDetail($orderId)
    {
        $order = Order::with('student', 'items')->findOrFail($orderId); 
        return view('admin.detail-order', compact('order', 'order->items'));
    }

    // complaint function
    public function adminComplaint()
    {
        $total_complaint = Complaint::count();
        $total_complaint_responded = Complaint::where('status', 'responded')->count();
        $total_complaint_pending = Complaint::where('status', 'pending')->count();
    
        $complaints = Complaint::select('id', 'student_id', 'title', 'date_at', 'status', 'created_at')->get();
    
        return view('admin.complaint', [
            'title'                     => 'Complaint Page',
            'complaints'                => $complaints,
            'total_complaint'           => $total_complaint,
            'total_complaint_responded' => $total_complaint_responded,
            'total_complaint_pending'   => $total_complaint_pending,
        ]);
    }

    // fungsi untuk melihat isi dari complaint
    public function showComplaint($complaintId)
    {
        $complaint = Complaint::findOrFail($complaintId);
        return view('admin.add-feedback', [
            'complaint' => $complaint,
        ]);
    }


    public function createFeedback(Request $request, $complaint_id)
    {
        $request->validate([
            'feedback_response' => 'required|string|max:255',
        ]);
    
        $complaint = Complaint::find($complaint_id);
    
        if (!$complaint) {
            return redirect()->back()->withErrors('Complaint not found');
        }
    
        Feedback::create([
            'complaint_id'      => $complaint->id,
            'student_id'        => $complaint->student_id,
            'feedback_response' => $request->feedback_response,
            'status'            => 'resolved',
            'date_at'           => now()->format('Y-m-d'),
        ]);
    
        $complaint->update([
            'status' => 'responded',
        ]);
    
        return redirect()->route('admin_complaint')->with('success', 'Feedback created successfully');
    }
}