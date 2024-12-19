<?php

namespace App\Http\Controllers;
use App\Models\Bill;
use App\Models\Item;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Track;
use App\Models\Student;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\StudentResource;
use Illuminate\Support\Facades\Storage;

class ApiController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $student = Student::where('username', $credentials['username'])->first();
        if ($student && Hash::check($credentials['password'], $student->password)) {
            $token = $student->createToken('StudentToken')->plainTextToken;
            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
                'role' => 'student',
                'links' => [
                    'profile' => route('profile.show', $student->id),
                ]
            ], 200);
        }

        $admin = Admin::where('username', $credentials['username'])->first();
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            $token = $admin->createToken('AdminToken')->plainTextToken;
            return response()->json([
                'message' => 'Login successful',
                'token' => $token,
                'role' => 'admin',
                'links' => [
                    'dashboard' => route('admin.dashboard'), 
                    'manage_users' => route('admin.manageUsers'),
                    'view_reports' => route('admin.viewReports')
                ]
            ], 200);
        }

        return response()->json([
            'error_message' => 'Invalid username or password'
        ], 401);
    }

    /* =========================================== */

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

        $student = auth('sanctum')->user();
        if (!$student) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $item = Item::create([
            'name'          => $request->input('name-item'),
            'quantity'      => $request->input('quantity'),
            'note'          => $request->input('note') ? $request->input('note') : '-',
            'student_id'    => $student->id,
        ]);

        return response()->json(['message' => 'Item added successfully', 'item' => $item], 201);
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

        $item = Item::findOrFail($id);
        $item->update([
            'name'          => $request->input('name-item'),
            'quantity'      => $request->input('quantity'),
            'note'          => $request->input('note') ? $request->input('note') : '-',
        ]);

        return response()->json(['message' => 'Item updated successfully', 'item' => $item], 200);
    }

    public function deleteItem($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return response()->json(['message' => 'Item deleted successfully'], 200);
    }

    public function orderDone()
    {
        $student = auth('sanctum')->user();
        if (!$student) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

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

        return response()->json(['message' => 'Order created successfully', 'order' => $order], 201);
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
    
        // cari student yang sedang login
        $student = auth('sanctum')->user();

        $complaint = Complaint::create([
            'order_id'      => $order->id,
            'student_id'    => $student->id,
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

        return response()->json(['message' => 'Complaint successfully submitted', 'complaint' => $complaint], 201);
    }

    public function editProfile(Request $request)
    {
        $request->validate([
            'dormitory_id' => 'required|exists:dormitories,id',
            'phone_number' => [
                'required',
                'string','min:12',
                'max:13',
                'regex:/^[0-9]+$/',
            ],
            'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $student = auth('sanctum')->user();
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

        return response()->json(['message' => 'Profile updated successfully', 'student' => $student], 200);
    }


    public function viewOrder(Request $request)
    {
        $student = auth('sanctum')->user();

        if (!$student) {
            return response()->json([
                'error_message' => 'User not authenticated'
            ], 401);
        }
        $orders = Order::where('student_id', $student->id)->get();

        if ($orders->isEmpty()) {
            return response()->json([
                'message' => 'No orders found for this user.'
            ], 404);
        }

        return response()->json([
            'message' => 'Orders retrieved successfully',
            'orders' => $orders,
        ], 200);
    }

    public function allStudent()
    {
        $students = Student::all();
        return StudentResource::collection($students);
    }

    public function getProfile(){
        $student = auth('sanctum')->user();
        return StudentResource::make($student);
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
                'weight' => 0,
                'price' => 0,
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

    public function createComplaintOrder(Request $request, $ordx_id){
        $validatedData = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $order = Order::where('ordx_id', $ordx_id)->first();
        if(!$order) {
            return response()->json([
                'error' => 'Order ID not found'
            ]);
        }

        $complaint = Complaint::create([
            'order_id' => $order->id,
            'student_id' => $order->student_id,
            'title' => $validatedData['title'],
            'date_at' => now()->format('Y-m-d'),
            'status' => 'pending',
            'image' => $request->image ?? null,
            'description' => $validatedData['description'],
        ]);

        return response()->json([
            'message' => 'Complaint created successfully',
            'complaint' => $complaint,
        ], 201);
    }

    public function trackOrder(Request $request){
        $student = auth('sanctum')->user();
        $order = Order::where('student_id', $student->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$order) {
            return response()->json([
                'error' => 'Order not found',
            ], 404);
        }
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

