<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Item;
use App\Models\Order;
use App\Models\Finance;
use App\Models\Student;
use App\Models\Feedback;
use App\Models\Complaint;
use App\Models\Dormitory;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
            'name-item'     => 'required|string|max:100',
            'quantity'      => 'required|integer',
            'note'          => 'nullable|string|max:200',
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
            'name-item'     => 'required|string|max:100',
            'quantity'      => 'required|integer',
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
<<<<<<< Updated upstream
        // Mendapatkan data student yang sedang login
        $student = auth()->guard('student')->user();

        // Membuat order baru
        $order = Order::create([
            'ordx_id' => Order::generateUniqueOrdxId(),
            'date_at' => now(),
            'student_id' => $student->id,
            'dormitory_id' => $student->dormitory_id,
            'status' => 'Pending',
            'items' => [],  // Inisialisasi kolom items (akan diisi nanti)
        ]);

        // Ambil semua item milik student dan siapkan data untuk disimpan dalam 'items'
        $items = Item::where('student_id', $student->id)->get();

        // Mengubah data item menjadi array untuk kolom 'items'
        $orderedItems = $items->map(function ($item) {
            return [
                'name' => $item->name,
                'quantity' => $item->quantity,
                'note' => $item->note,
            ];
        });

        // Menyimpan data item dalam format JSON ke kolom 'items'
        $order->update([
            'items' => $orderedItems->toArray(),
        ]);

        // Hapus item yang sudah diproses dari tabel sementara
        Item::where('student_id', $student->id)->delete();

        // Redirect ke halaman ringkasan order
        return view('student.order-summary', [
            'title' => 'Order Summary',
            'order' => $order,
        ]);
    }


public function yourOrder()
    {
        $student = auth()->guard('student')->user();
        $orders = Order::with('itemOrders') // Include itemOrders for better performance
            ->where('student_id', $student->id)
            ->get();

        return view('student.your-order', [
            'title' => 'Your Order',
            'orders' => $orders,
        ]);
    }

    public function yourDetail($ordx_id)
    {
        // Cari order berdasarkan ID (gunakan firstOrFail untuk memastikan jika order tidak ditemukan, akan menghasilkan 404)
        $order = Order::where('ordx_id', $ordx_id)->firstOrFail(); // Mengambil order berdasarkan ordx_id

        // Tidak perlu json_decode karena 'items' sudah berupa array
        $items = $order->items; // Cukup ambil data 'items' yang sudah dalam format array

        return view('student.detail-your-order', [
            'title' => 'Your Order Detail',
            'order' => $order,
            'items' => $items, // Kirim data 'items' langsung tanpa decode
        ]);
    }

    public function yourComplaint($ordx_id)
    {
        // Pastikan ordx_id dalam lowercase
        $ordx_id = strtolower($ordx_id);
        
        // Cari order berdasarkan ordx_id
        $order = Order::where('ordx_id', $ordx_id)->firstOrFail();

        return view('student.complaint-your-order', [
            'title' => 'Your Complaint',
            'order' => $order, // Kirimkan data order ke blade
        ]);
    }

public function submitComplaint(Request $request, $ordx_id)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    // Cari order berdasarkan ordx_id
    $order = Order::where('ordx_id', $ordx_id)->firstOrFail();

    $complaint = Complaint::create([
        'order_id' => $order->id,
        'student_id' => auth()->guard('student')->id(),
        'title' => $request->input('title'),
        'description' => $request->input('description'),
        'date_at' => now(),
        'status' => 'Pending',
    ]);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('complaints', 'public');
        $complaint->photos()->create(['photo' => $imagePath]);
    }

    return redirect()->route('homepage', strtolower($order->ordx_id))->with('success', 'Complaint submitted successfully.');
}

public function yourFeedback($order_id)
{
    $order = Order::findOrFail($order_id);

    return view('student.feedback-your-order', [
        'title' => 'Your Feedback',
        'order' => $order,
    ]);
}
=======
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

        // ketika order selesai dilakukan masukkan order ke dalam model Bill dan sesuaikan serta golongkan ke dalam bulan sekarang
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
            'title'         => 'required|string|max:255',
            'description'   => 'required|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
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
    
        // Cari complaint dari order
        $complaint = Complaint::where('order_id', $order->id)->first();
    
        // Cari feedback dari complaint
        $feedback = $complaint ? Feedback::where('complaint_id', $complaint->id)->first() : null;
    
        return view('student.feedback-your-order', [
            'title' => 'Your Feedback',
            'order' => $order,
            'complaint' => $complaint,
            'feedback' => $feedback,
        ]);
    }
>>>>>>> Stashed changes

    public function complaint()
    {
        return view('student.complaint', [
            'title' => 'Create Complaint',
        ]);
    }

    public function createComplaint(Request $request){
        $request->validate([
            'order-id'      => 'required|string|max:12',
            'title'         => 'required|string|max:200',
            'image'         => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description'   => 'required|string|max:500',
        ]);

        Complaint::create([
            'order_id'      => $request->input('order-id'),
            'title'         => $request->input('title'),
            'image'         => $request->input('image'),
            'description'   => $request->input('description'),
        ]);

        return redirect()->route('complaint')->with('success', 'Complaint created successfully');
    }

    // notification function
    public function notification()
    {
        return view('student.notification', [
            'title' => 'Notification Page',
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

<<<<<<< Updated upstream
        // Update data mahasiswa
=======
>>>>>>> Stashed changes
        $student->update([
            'dormitory_id' => $request->input('dormitory_id'),
            'phone_number' => $request->input('phone_number'),
        ]);

<<<<<<< Updated upstream
        // Proses upload foto jika ada
        if ($request->hasFile('profile_photo')) {
            // Simpan foto baru ke folder 'profile_photos' di disk 'public'
            $photoPath = $request->file('profile_photo')->store('profile_photos', 'public');

            // Hapus foto lama jika ada
            if ($student->photo) {
                Storage::disk('public')->delete($student->photo);
            }

            // Update kolom 'photo' di tabel 'students' dengan path foto baru
=======
        if ($request->hasFile('profile_photo')) {
            $file_name = date('Y-m-d') . '-' . $request->file('profile_photo')->getClientOriginalName();

            $photoPath = 'photo-student/' . $file_name;

            if ($student->photo && Storage::disk('public')->exists($student->photo)) {
                Storage::disk('public')->delete($student->photo);
            }

            Storage::disk('public')->put($photoPath, file_get_contents($request->file('profile_photo')));
            
>>>>>>> Stashed changes
            $student->update([
                'photo' => $photoPath,
            ]);
        }

        return redirect()->back()->with('success', 'Profile updated successfully');
    }

<<<<<<< Updated upstream

    // track function
    public function track()
    {
        return view('student.track', [
            'title' => 'Track',
        ]);
    }

    public function finance()
{
    // Mengambil semua order yang statusnya 'Done' berdasarkan student_id yang sedang login
    $orders = Order::where('student_id', auth()->guard('student')->id())
        ->where('status', 'Done')
        ->get()
        ->groupBy(function ($order) {
            // Mengelompokkan order berdasarkan bulan dan tahun
            return $order->date_at->format('F Y');
        })
        ->map(function ($orders) {
            // Menghitung total berat dan total biaya per bulan
            return [
                'month' => $orders->first()->date_at->format('F Y'),
                'total_weight' => $orders->sum('total_weight'),
                'total_amount' => $orders->sum('total_amount'),
            ];
        });

    // Membuat record di model Bill untuk setiap bulan yang dihitung
    foreach ($orders as $order) {
        // Membuat tagihan untuk setiap bulan yang dihitung
        Bill::create([
            'student_id' => auth()->guard('student')->id(),
            'order_id' => $order['order_id'], // Pastikan memiliki relasi yang tepat dengan order_id
            'date_at' => now(),
            'month' => $order['month'],
            'total_weight' => $order['total_weight'],
            'total_amount' => $order['total_amount'],
        ]);
    }

    // Mengambil semua tagihan yang telah dibuat dan mengirim ke view
    $finances = Bill::where('student_id', auth()->guard('student')->id())->get();

    return view('student.finance', [
        'title' => 'Finance',
        'finances' => $finances,
    ]);
}


    public function detailFinance($id)
    {
        // Cari detail finance berdasarkan ID
        $finance = Bill::findOrFail($id);
        // Ambil semua data yang relevan dari relasi atau model lainnya
        return view('student.detail-finance', compact('Bill'));
    }
=======

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
>>>>>>> Stashed changes
    
        return view('student.detail-finance', [
            'title'         => 'Payment Details',
            'billDetail'    => $billDetail,
            'orders'        => $orders,
        ]);
    }
    
    // Track 
    public function track()
    {
        // cari order yang paling awal dari segi detik yang akan di cek tracknya berdasarkan $table->enum('status',['order-received', 'pick-up', 'on-process', 'delivery', 'done']);
        $studentId = auth()->guard('student')->id();
        $order = Order::where('student_id', $studentId)
            ->orderBy('date_at', 'asc')
            ->first();

        return view('student.track', [
            'title' => 'Track',
            'order' => $order,
        ]);
    }
}
