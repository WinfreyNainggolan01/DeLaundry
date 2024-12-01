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

    public function addItem(Request $request)
    {

        $validatedData = $request->validate([
            'name_item' => 'required|string|max:100',
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable|string|max:200',
        ]);

        $student = auth('sanctum')->user();

        $item = Item::create([
            'name' => $validatedData['name_item'],
            'quantity' => $validatedData['quantity'],
            'note' => $validatedData['note'] ?? '-',
            'student_id' => $student->id,
        ]);

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
        $validatedData = $request->validate([
            'name_item' => 'required|string|max:100',
            'quantity' => 'required|integer|min:1',
            'note' => 'nullable|string|max:260',
        ]);

        $student = auth('sanctum')->user();
        $item = Item::where('id', $id)->where('student_id', $student->id)->first();

        if (!$item) {
            return response()->json([
                'error' => 'Item not found or does not belong to you',
            ], 404);
        }

        $item->update([
            'name' => $validatedData['name_item'],
            'quantity' => $validatedData['quantity'],
            'note' => $validatedData['note'] ?? $item->note,
        ]);

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
        $student = auth('sanctum')->user();
        if (!$student) {
            return response()->json([
                'error' => 'Unauthorized',
            ], 401);
        }
        $item = Item::where('id', $id)->where('student_id', $student->id)->first();
        if (!$item) {
            return response()->json([
                'error' => 'Item not found or does not belong to you',
            ], 404);
        }

        $item->delete();
        return response()->json([
            'message' => 'Item deleted successfully',
        ], 200);
    }

    public function doneOrder()
    {
        $student = auth('sanctum')->user();

        if (!$student) {
            return response()->json([
                'error' => 'Unauthorized',
            ], 401); 
        }

        $items = Item::where('student_id', $student->id)->get();

        if ($items->isEmpty()) {
            return response()->json([
                'error' => 'No items found for the order.',
            ], 400);
        }

        try {
            $order = Order::create([
                'ordx_id' => Order::generateUniqueOrdxId(),
                'date_at' => now(),
                'student_id' => $student->id,
                'dormitory_id' => $student->dormitory_id,
                'status' => 'Pending',
                'items' => [], 
            ]);

            $orderedItems = $items->map(function ($item) {
                return [
                    'name' => $item->name,
                    'quantity' => $item->quantity,
                    'note' => $item->note,
                ];
            });

            $order->update([
                'items' => $orderedItems->toArray(),
            ]);

            Item::where('student_id', $student->id)->delete();

            return response()->json([
                'message' => 'Order placed successfully',
                'order' => [
                    'id' => $order->id,
                    'ordx_id' => $order->ordx_id,
                    'status' => $order->status,
                    'items' => $order->items, 
                ],
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'There was an error processing your order.',
                'message' => $e->getMessage(), 
            ], 500); 
        }
    }


    public function getStudentOrder()
    {
        $student = auth('sanctum')->user();
        if (!$student) {
            return response()->json([
                'error' => 'Unauthorized',
            ], 401);
        }

        $orders = Order::where('student_id', $student->id)
            ->with(['itemOrders.item']) 
            ->get();

        return response()->json([
            'message' => 'Orders retrieved successfully',
            'orders' => $orders,
        ], 200);
    }

    public function createComplaintOrder(Request $request){
        $order = Order::find($request->order_id);
        if (!$order) {
            return response()->json([
                'error' => 'Order ID not found',
            ], 404);
        }

        $complaint = Complaint::create([
            'order_id' => $order->id,
            'student_id' => $order->student_id,
            'title' => $request->title,
            'date' => now()->format('Y-m-d'),
            'status' => 'pending',
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
}

