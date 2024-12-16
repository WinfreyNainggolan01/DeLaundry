<?php

namespace App\Http\Controllers;

<<<<<<< Updated upstream
use App\Models\Order;
use App\Models\Student;
=======
use App\Models\Bill;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Student;
use App\Models\Feedback;
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
        return view('admin.dashboard',[
            // send total user in database 
            'total_user' => Student::count(),
            'total_order' => Order::count(),
            'total_complaint' => Complaint::count(),
=======
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
>>>>>>> Stashed changes
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
<<<<<<< Updated upstream
        // ambil semua order yang berasal dari database untuk ditampilkan kedalam tabel admin dan buat total order yang dilakukan oleh user yang akan ditampilkan dalam page admin.order
        $orders = Order::all();
        $total_order = Order::count();
        return view('admin.order', [
            'orders' => $orders,
            'total_order' => $total_order,
        ]);
    }

    public function admin_order_detail($id)
    {
        // ambil data order berdasarkan id yang dikirim dari route
        $order = Order::with('items')->find($id);
        return view('admin.order_detail', [
            'order' => $order,
            'items' => $order->items,
        ]);
    }

    // fungsi untuk mengubah order yaitu status, weight dan total
    public function admin_order_update(Request $request, $id)
    {
        // ambil data order berdasarkan id yang dikirim dari route
        $order = Order::find($id);
        // update data order
        $order->update([
            'status' => $request->status,
            'weight' => $request->weight,
            'total' => $request->total,
        ]);
        // redirect ke halaman order
        return redirect()->route('admin.order');
    }

    public function showDetail($orderId)
    {
        $order = Order::with('student', 'items')->findOrFail($orderId); // Load the items and student relationships
        return view('admin.detail-order', compact('order', 'order->items'));
    }

    // complaint function
    public function admin_complaint()
=======
        $orders = Order::all();
        $total_order = Order::count();
        return view('admin.order', [
            'orders'        => $orders,
            'total_order'   => $total_order,
        ]);
    }

    public function admin_order_detail($ordx_id)
>>>>>>> Stashed changes
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