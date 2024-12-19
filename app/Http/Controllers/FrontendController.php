<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Item;
use App\Models\Order;
use App\Models\Track;
use App\Models\Finance;
use App\Models\Student;
use App\Models\Feedback;
use App\Models\Complaint;
use App\Models\Dormitory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class FrontendController extends Controller
{
    // homepage function
    public function homepage()
    {
        return view('student.homepage', [
            'title' => 'Home Page',
        ]);
    }

    // order function
    public function order()
    {
        $title = 'Create an Order';
        $studentId = auth()->guard('student')->user()->id;
        
        $items = Item::whereDoesntHave('itemOrders.order', function ($query) use ($studentId) {
            $query->where('student_id', $studentId);
        })->get();
    
        return view('student.order', compact('items','title'));
    }

    public function addItem(Request $request)
    {
        $request->validate([
            'name-item' => [
                'required',
                'string',
                'max:100',
                function ($attribute, $value, $fail) {
                    if (preg_match_all('/[^a-zA-Z0-9\s]/', $value) > 4) {
                        $fail('The ' . $attribute . ' may not contain more than 4 non-alphanumeric characters.');
                    }
                },
            ],
            'quantity' => 'required|integer|min:0|max:200',
            'note' => [
                'nullable',
                'string',
                'max:200',
                function ($attribute, $value, $fail) {
                    if (preg_match_all('/[^a-zA-Z0-9\s]/', $value) > 4) {
                        $fail('The ' . $attribute . ' may not contain more than 4 non-alphanumeric characters.');
                    }
                },
            ],
        ]);

        $student = auth()->guard('student')->user();
        Item::create([
            'name'          => $request->input('name-item'),
            'quantity'      => $request->input('quantity'),
            'note'          => $request->input('note') ? $request->input('note') : '-',
            'student_id'    => $student->id,
        ]);

        return redirect()->back()->with('success', 'Item added successfully');
    }

    public function editItem(Request $request, $id)
    {
        $request->validate([
            'name-item' => [
                'required',
                'string',
                'max:100',
                function ($attribute, $value, $fail) {
                    if (preg_match_all('/[^a-zA-Z0-9\s]/', $value) > 4) {
                        $fail('The ' . $attribute . ' may not contain more than 4 non-alphanumeric characters.');
                    }
                },
            ],
            'quantity' => 'required|integer|min:0|max:200',
        ]);

        $item = Item::findOrFail($id);
        $item->update([
            'name'          => $request->input('name-item'),
            'quantity'      => $request->input('quantity'),
            'note'          => $request->input('note') ? $request->input('note') : '-',
        ]);
        return redirect()->back()->with('success', 'Item updated successfully');
    }

    public function deleteItem($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->back()->with('success', 'Item deleted successfully');
    }

    public function orderDone()
    {
        $student = auth()->guard('student')->user();
        $order = Order::create([
            'ordx_id'       => Order::generateUniqueOrdxId(),
            'date_at'       => now(),
            'student_id'    => $student->id,
            'dormitory_id'  => $student->dormitory_id,
            'weight'        => 0,
            'price'         => 0,
            'status'        => 'Pending',
            'items'         => [],
        ]);

        $items = Item::where('student_id', $student->id)->get();
        $orderedItems = $items->map(function ($item) {
            return [
                'name'      => $item->name,
                'quantity'  => $item->quantity,
                'note'      => $item->note,
            ];
        });

        $order->update([
            'items' => $orderedItems->toArray(),
        ]);

        Item::where('student_id', $student->id)->delete();
        $bill = Bill::where('student_id', $student->id)
            ->whereMonth('date_at', now()->format('m'))
            ->first();
        
        if ($bill) {
            $bill->update([
                'total_weight' => $bill->total_weight + $order->weight,
                'total_amount' => $bill->total_amount + $order->price,
            ]);
        } else {
            Bill::create([
                'student_id'    => $student->id,
                'order_id'      => $order->id,
                'date_at'       => now(),
                'month'         => now()->format('Y-m'),
                'total_weight'  => $order->weight,
                'total_amount'  => $order->price,
                'status'        => 'unpaid',
            ]);
        }
        Track::truncate();
        Track::create([
            'order_id'  => $order->id,
            'messages'  => json_encode([
                [
                    'status'        => 'pending',
                    'description'   => 'Order has been created',
                    'date_at'       => now()->setTimezone('Asia/Jakarta')->format('D, d M Y'),
                    'time_at'       => now()->setTimezone('Asia/Jakarta')->format('H:i') . ' WIB',
                ],
            ]),
        ]);

        return view('student.order-summary', [
            'title' => 'Order Summary',
            'order' => $order,
        ]);
    }

    public function yourOrder()
    {
        $student = auth()->guard('student')->user();
        $orders = Order::with('itemOrders')
            ->where('student_id', $student->id)
            ->get();

        return view('student.your-order', [
            'title'     => 'Your Order',
            'orders'    => $orders,
        ]);
    }

    public function yourDetail($ordx_id)
    {
        $order = Order::where('ordx_id', $ordx_id)->firstOrFail();
        $items = $order->items;

        return view('student.detail-your-order', [
            'title' => 'Your Order Detail',
            'order' => $order,
            'items' => $items,
        ]);
    }

    public function yourComplaint($ordx_id)
    {
        $ordx_id = strtolower($ordx_id);
        $order = Order::where('ordx_id', $ordx_id)->firstOrFail();

        return view('student.complaint-your-order', [
            'title' => 'Your Complaint',
            'order' => $order,
        ]);
    }

    public function submitComplaint(Request $request, $ordx_id)
    {
        $request->validate([
            'title' => [
                'required',
                'string',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (preg_match_all('/[^a-zA-Z0-9\s]/', $value) > 4) {
                        $fail('The characters may not contain more than 4 non-alphanumeric characters.');
                    }
                },
            ],
            'description' => [
                'required',
                'string',
                function ($attribute, $value, $fail) {
                    if (preg_match_all('/[^a-zA-Z0-9\s]/', $value) > 4) {
                        $fail('The characters may not contain more than 4 non-alphanumeric characters.');
                    }
                },
            ],
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $order = Order::where('ordx_id', $ordx_id)->firstOrFail();
    
        if ($order->student_id !== auth()->guard('student')->id()) {
            return redirect()->route('homepage')->withErrors('You are not authorized to submit a complaint for this order.');
        }

        $order = Order::where('ordx_id', $ordx_id)->firstOrFail();

        
        $complaint = Complaint::create([
            'order_id'      => $order->id,
            'student_id'    => auth()->guard('student')->id(),
            'ordx_id'       => $order->ordx_id,
            'title'         => $request->input('title'),
            'description'   => $request->input('description'),
            'date_at'       => now()->format('Y-m-d H:i:s'),
            'status'        => 'Pending',
            
        ]);

        // implementasi Cloudinary upload image
        if(request()->hasFile('image')){
            $path = 'delaundry-cloud';
            $file = request()->file('image')->getClientOriginalName();
            $file_name = pathinfo($file, PATHINFO_FILENAME);

            $publicId = date('Y-m-d') . '-' . $file_name;
            Cloudinary::upload($request->file('image')->getRealPath(), [
                'folder' => $path,
                'public_id' => $publicId,
            ]);

            $complaint->update([
                'image_public_id' => $path.'/'.$publicId,
            ]);
        }
        
        if ($request->hasFile('image')) {
            $file_name = date('Y-m-d') . '-' . $request->file('image')->getClientOriginalName();
            $photo_path = 'complaints/' . $file_name;

            if($complaint->image && Storage::disk('public')->exists($complaint->image)){
                Storage::disk('public')->delete($complaint->image);
            }

            Storage::disk('public')->put($photo_path, file_get_contents($request->file('image')));

            $complaint->update([
                'image' => $photo_path,
            ]);
        }

        return redirect()->route('homepage', strtolower($order->ordx_id))
                        ->with('success', 'Complaint successfully submitted.');
    }
    

    public function yourFeedback($ordx_id)
    {
        $ordx_id = strtolower($ordx_id);
        $order = Order::where('ordx_id', $ordx_id)->firstOrFail();
    
        $complaint = Complaint::where('order_id', $order->id)->first();
    
        $feedback = $complaint ? Feedback::where('complaint_id', $complaint->id)->first() : null;
    
        return view('student.feedback-your-order', [
            'title' => 'Your Feedback',
            'order' => $order,
            'complaint' => $complaint,
            'feedback' => $feedback,
        ]);
    }

    // profile function
    public function profile()
    {
        $student = auth()->guard('student')->user();
        $dormitories = Dormitory::all();

        return view('student.profile', [
            'title' => 'Profile',
            'student' => $student,
            'dormitories' => $dormitories,
        ]);
    }

    public function editProfile(Request $request)
    {
        $request->validate([
            'dormitory_id' => 'required|exists:dormitories,id',
            'phone_number' => 'required|string|max:15',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $student = auth()->guard('student')->user();
        $student = Student::findOrFail($student->id);

        $student->update([
            'dormitory_id' => $request->input('dormitory_id'),
            'phone_number' => $request->input('phone_number'),
        ]);

        if ($request->hasFile('profile_photo')) {
            $file_name = date('Y-m-d') . '-' . $request->file('profile_photo')->getClientOriginalName();

            $photoPath = 'photo-student/'.$file_name;

            if ($student->photo && Storage::disk('public')->exists($student->photo)) {
                Storage::disk('public')->delete($student->photo);
            }

            Storage::disk('public')->put($photoPath, file_get_contents($request->file('profile_photo')));
            
            $student->update([
                'photo' => $photoPath,
            ]);
        }

        return redirect()->back()->with('success', 'Profile updated successfully');
    }


    // Finance
    public function finance()
    {
        $studentId = auth()->guard('student')->id();
        $currentBillOrders = Order::where('student_id', $studentId)
            ->where('status', 'done')
            ->whereMonth('date_at', now()->format('m'))
            ->get();
        
        $totalAmount = Order::where('student_id', $studentId)
            ->where('status', 'done')
            ->whereMonth('date_at', now()->format('m'))
            ->sum('price');

        $bills = Bill::where('student_id', $studentId)
            ->whereMonth('date_at', now()->format('m'))
            ->get();
        
        return view('student.finance', [
            'title'             => 'Finances',
            'totalAmount'       => $totalAmount,
            'bills'             => $bills,
            'currentBillOrders' => $currentBillOrders,
        ]);
    }

    public function financeDetail($id)
    {
        $billDetail = Bill::findOrFail($id);
        $orders = Order::where('student_id', $billDetail->student_id)
            ->where('status', 'done')
            ->whereMonth('date_at', now()->format('m'))
            ->get();
    
        return view('student.detail-finance', [
            'title'         => 'Payment Details',
            'billDetail'    => $billDetail,
            'orders'        => $orders,
        ]);
    }
    
    public function track()
    {
        $studentId = auth()->guard('student')->id();
        $order = Order::where('student_id', $studentId)
            ->orderBy('date_at', 'desc')
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$order) {
            return redirect()->route('homepage')->withErrors('No orders found.');
        }

        $track = Track::where('order_id', $order->id)->first();
        $messages = $track ? json_decode($track->messages, true) : [];

        return view('student.track', [
            'title' => 'Track',
            'order' => $order,
            'messages' => $messages,
        ]);
    }
}
