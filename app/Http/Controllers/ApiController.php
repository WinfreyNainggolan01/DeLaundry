<?php

namespace App\Http\Controllers;
use App\Models\Item;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Student;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Http\Resources\StudentResource;
use App\Models\Track;

class ApiController extends Controller
{
    public function allStudent()
    {
        $students = Student::all();
        return StudentResource::collection($students);
    }

    public function getProfile(Request $request){
        $user = $request->user();
        return StudentResource::make($user);
    }

    public function editProfile(Request $request){
        $user = $request->user();
        $request->validate([
            'phone_number' => 'required|string|max:15',
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'dormitory_id' => 'required|exists:dormitories,id',
        ]);

        $profile_photo = $user->profile_photo;
        if ($request->hasFile('profile_photo')) {
            $profile_photo = $request->file('profile_photo')->store('images', 'public');
        }

        $user->update([
            'phone_number' => $request->phone_number,
            'profile_photo' => $profile_photo,
            'dormitory_id' => $request->dormitory_id,
        ]);

        return StudentResource::make($user);
    }

    public function me(Request $request) 
    {
        $user = Auth::user();
        // $post = Post::where('user',$user->id);
        return response()->json(Auth::user());
    }

    public function addItem(Request $request)
{
    // Validasi input
    $validatedData = $request->validate([
        'name_item' => 'required|string|max:100', // Mengubah nama menjadi snake_case agar sesuai konvensi API
        'quantity' => 'required|integer|min:1',
        'note' => 'nullable|string|max:200',
    ]);

    // Mendapatkan pengguna yang sedang login
    $student = auth('sanctum')->user();

    // Membuat item baru
    $item = Item::create([
        'name' => $validatedData['name_item'],
        'quantity' => $validatedData['quantity'],
        'note' => $validatedData['note'] ?? '-',
        'student_id' => $student->id,
    ]);

    // Mengembalikan respons JSON
    return response()->json([
        'message' => 'Item added successfully',
        'item' => [
            'id' => $item->id,
            'name' => $item->name,
            'quantity' => $item->quantity,
            'note' => $item->note,
            'student_id' => $item->student_id,
        ],
    ], 201);
}


    public function editItem(Request $request, $id)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name_item' => 'required|string|max:100', // Snake_case sesuai standar API
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable|string|max:260',
        ]);

        $student = auth('sanctum')->user();
        // Cek apakah item milik student yang sedang login
        $item = Item::where('id', $id)->where('student_id', $student->id)->first();

        if (!$item) {
            return response()->json([
                'error' => 'Item not found or does not belong to you',
            ], 404);
        }

        // Update item
        $item->update([
            'name' => $validatedData['name_item'],
            'quantity' => $validatedData['quantity'],
            'note' => $validatedData['note'] ?? $item->note,
        ]);

        // Respons JSON
        return response()->json([
            'message' => 'Item updated successfully',
            'item' => [
                'id' => $item->id,
                'name' => $item->name,
                'quantity' => $item->quantity,
                'note' => $item->note,
            ],
        ], 200);
    }

    public function deleteItem($id)
    {
        // Dapatkan pengguna yang sedang login
        $student = auth('sanctum')->user();

        if (!$student) {
            return response()->json([
                'error' => 'Unauthorized',
            ], 401);
        }

        // Cari item berdasarkan ID dan pastikan milik student yang sedang login
        $item = Item::where('id', $id)->where('student_id', $student->id)->first();

        if (!$item) {
            return response()->json([
                'error' => 'Item not found or does not belong to you',
            ], 404);
        }

        // Hapus item
        $item->delete();

        return response()->json([
            'message' => 'Item deleted successfully',
        ], 200);
    }

    public function doneOrder(Request $request)
    {
        $student = auth('sanctum')->user();

        if (!$student) {
            return response()->json([
                'error' => 'Unauthorized',
            ], 401);
        }

        // Membuat data pesanan
        $order = Order::create([
            'ordx_id' => 'DLRX' . mt_rand(100000000000000, 999999999999999),
            'date_at' => now()->format('Y-m-d'),
            'student_id' => $student->id,
            'dormitory_id' => $student->dormitory_id,
        ]);

        // Hubungkan semua item dengan pesanan baru
        $items = Item::where('student_id', $student->id)->get();
        $orderedItems = [];
        foreach ($items as $item) {
            $orderItem = $order->itemOrders()->create([
                'item_id' => $item->id,
                'quantity' => $item->quantity,
            ]);

            // Tambahkan item ke daftar yang dipesan
            $orderedItems[] = [
                'name' => $item->name,
                'quantity' => $item->quantity,
                'note' => $item->note,
            ];
        }

        return response()->json([
            'message' => 'Order done successfully',
            'order' => $order,
            'ordered_items' => $orderedItems,
        ], 201);
    }

    public function getStudentOrder()
    {
        // Mendapatkan mahasiswa yang sedang login
        $student = auth('sanctum')->user();

        if (!$student) {
            return response()->json([
                'error' => 'Unauthorized',
            ], 401);
        }

        // Mengambil semua order berdasarkan student_id
        $orders = Order::where('student_id', $student->id)
            ->with(['itemOrders.item']) 
            ->get();

        return response()->json([
            'message' => 'Orders retrieved successfully',
            'orders' => $orders,
        ], 200);
    }

    public function createComplaintOrder(Request $request){
        // mengambil order berdasarkan id order dari request
        $order = Order::find($request->order_id);
        if (!$order) {
            return response()->json([
                // buatkan pesan Order ID tidak ditemukan
                'error' => 'Order ID not found',
            ], 404);
        }

        $complaint = Complaint::create([
            'order_id' => $order->id,
            'student_id' => $order->student_id,
            'title' => $request->title,
            'date' => now()->format('Y-m-d'),
            'status' => 'pending',
            // image 
            'image' => $request->image ?? null,
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'Complaint created successfully',
            'complaint' => $complaint,
        ], 201);
    }

    public function trackOrder(Request $request){
        $student = auth('sanctum')->user();
        // mengambil order terakhir yang dilakukan oleh user
        $order = Order::where('student_id', $student->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$order) {
            return response()->json([
                'error' => 'Order not found',
            ], 404);
        }

        // membuat track order dari kelas Track dengan tabel column order_id, status, description, date
        $track = Track::create([
            'order_id' => $order->id,
            'status' => 'pending',
            'description' => 'Order is being processed',
            'date' => now()->format('Y-m-d'),
        ]);

        return response()->json([
            'message' => 'Order tracked successfully',
            'track' => $track,
        ], 201);
    }

    // fungsi untuk menampilkan data profile dari user yang sedang login 

}

