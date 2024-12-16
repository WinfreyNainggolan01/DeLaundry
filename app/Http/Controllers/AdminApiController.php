<?php

namespace App\Http\Controllers;

<<<<<<< Updated upstream
=======
use App\Models\Admin;
>>>>>>> Stashed changes
use App\Models\Order;
use App\Models\Student;
use App\Models\Feedback;
use App\Models\Complaint;
use Illuminate\Http\Request;

class AdminApiController extends Controller
{
<<<<<<< Updated upstream
=======
    public function getProfile()
    {
        $admin = auth('admin')->user();

        return response()->json([
            'admin' => $admin,
        ], 200);
    }

    public function editProfile(Request $request)
    {
        $request->validate([
            'phone_number'  => 'required',
            'photo'         => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $admin = auth('admin')->user();

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo_name = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('images'), $photo_name);
        } else {
            $photo_name = $admin->photo;
        }
        $admin = Admin::find($admin->id);
        $admin->update([
            'phone_number'  => $request->phone_number,
            'photo'         => $photo_name,
        ]);

        return response()->json([
            'message' => 'Profile updated successfully',
            'admin' => $admin,
        ], 200);
    }
>>>>>>> Stashed changes

    public function getDashboard()
    {
        $total_student = Student::count();
        $total_order = Order::count();
        $total_complaint = Complaint::count();

<<<<<<< Updated upstream

        // masukkan data order per bulan kedalam model model 
        $order_per_month = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->get();
        $income_per_month = Order::selectRaw('MONTH(created_at) as month, SUM(total_price) as total')
=======
        $order_per_month = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->get();
        $income_per_month = Order::selectRaw('MONTH(created_at) as month, SUM(price) as total')
>>>>>>> Stashed changes
            ->groupBy('month')
            ->get();

        return response()->json([
<<<<<<< Updated upstream
            'total_student' => $total_student,
            'total_order' => $total_order,
            'total_complaint' => $total_complaint,
            'order_per_month' => $order_per_month,
            'income_per_month' => $income_per_month,
        ], 200);
    }

public function getAllStudent()
{
    $students = Student::with('dormitory')
        ->select('id', 'name')
        ->paginate(10);

    return response()->json([
        'students' => $students,
    ], 200);
}


public function getAllOrder()
{
    $orders = Order::with('student')
        ->select('id', 'student_id', 'weight', 'status', 'created_at')
        ->paginate(10);

    return response()->json([
        'orders' => $orders,
    ], 200);
}

public function getDetailOrder($order_id)
{
    $order = Order::with('student', 'itemOrders.item')
        ->where('id', $order_id)
        ->first();

    if (!$order) {
        return response()->json([
            'error' => 'Order not found',
        ], 404); 
    }

    return response()->json([
        'order' => $order,
    ], 200);
}

public function addDetailOrder(Request $request)
{
    $order = Order::find($request->order_id);

    if (!$order) {
        return response()->json([
            'error' => 'Order not found',
        ], 404);
    }

    $request->validate([
        'weight' => 'required|numeric|min:1', 
    ]);

    $total_price = $request->weight * 15000; 

    $order->update([
        'weight' => $request->weight,
        'total_price' => $total_price,
    ]);

    return response()->json([
        'message' => 'Order detail updated successfully',
        'order' => $order,
    ], 200);
}


    public function getAllComplaint()
=======
            'total_student'         => $total_student,
            'total_order'           => $total_order,
            'total_complaint'       => $total_complaint,
            'order_per_month'       => $order_per_month,
            'income_per_month'      => $income_per_month,
        ], 200);
    }

    public function getAllStudent(Request $request)
    {
        try {
            $perPage = $request->input('per_page', 10);
    
            $students = Student::with('dormitory')
                ->select('id', 'name', 'nim', 'gender', 'program_study', 'phone_number', 'photo', 'dormitory_id')
                ->paginate($perPage);
            return response()->json([
                'students' => $students,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'error'     => 'Failed to fetch students',
                'message'   => $e->getMessage(),
            ], 500);
        }
    }
    
    public function getAllOrder()
    {
        $orders = Order::with(['student', 'itemOrders'])->get();
        $orderData = $orders->map(function ($order) {
            return [
                'ordx_id'      => $order->ordx_id,
                'student_name' => $order->student->name,   
                'order_date'   => $order->date_at,          
                'total_items'  => $order->itemOrders->count(), 
                'weight'       => $order->weight,    
                'status'       => $order->status,
                'created_at'   => $order->created_at,       
            ];
        });
    
        return response()->json($orderData);
    }


    public function getDetailOrder($ordx_id)
    {
        $order = Order::with('student', 'dormitory', 'itemOrders')
            ->where('ordx_id', $ordx_id)
            ->first();

        if (!$order) {
            return response()->json([
                'error' => 'Order not found',
            ], 404);
        }

        return response()->json([
            'order' => $order,
        ], 200);
        
    }
    
    public function addDetailOrder(Request $request, $ordx_id)
    {
        $order = Order::where('ordx_id', $ordx_id)->first();
        if (!$order) {
            return response()->json([
                'error' => 'Order not found',
            ], 404);
        }

        $request->validate([
            'weight' => 'required|numeric|min:1', 
        ]);

        $total_price = $request->weight * 12000; 

        $order->update([
            'weight'    => $request->weight,
            'price'     => $total_price,
        ]);

        return response()->json([
            'message' => 'Order detail updated successfully',
            'order' => $order,
        ], 200);
    }

    public function getAllComplaints()
>>>>>>> Stashed changes
    {
        $total_complaint = Complaint::count();
        $total_complaint_responded = Complaint::where('status', 'responded')->count();
        $total_complaint_pending = Complaint::where('status', 'pending')->count();

<<<<<<< Updated upstream
        $complaints = Complaint::with('student')
            ->select('id', 'student_id', 'title', 'date', 'status', 'created_at')
            ->paginate(10);
        return response()->json([
            'complaints' => $complaints,
            'total_complaint' => $total_complaint,
            'total_complaint_responded' => $total_complaint_responded,
            'total_complaint_pending' => $total_complaint_pending,
=======
        $complaints = Complaint::all()
            ->select('id', 'student_id', 'title', 'date_at', 'status', 'created_at');
            
        return response()->json([
            'complaints'                => $complaints,
            'total_complaint'           => $total_complaint,
            'total_complaint_responded' => $total_complaint_responded,
            'total_complaint_pending'   => $total_complaint_pending,
>>>>>>> Stashed changes
        ], 200);
    }

    public function getDetailComplaint($complaint_id)
    {
        $complaint = Complaint::with('student', 'feedbacks')
            ->where('id', $complaint_id)
            ->first();
        return response()->json([
            'complaint' => $complaint,
        ], 200);
    }

<<<<<<< Updated upstream
    // Route::post('/admin/complaints/{id}', [AdminApiController::class, 'responseComplaint']);
    // model feedback
    // protected $fillable = [
    //     'complaint_id',
    //     'student_id',
    //     'feedback_response',
    //     'status',
    //     'date_at',
    // ];
    // admin akan mengirimkan feedback berupa response terhadap complaint yang diajukan oleh user
    public function responseComplaint(Request $request, $complaint_id)
    {
        $complaint = Complaint::find($complaint_id);
=======
    public function createFeedback(Request $request, $complaint_id)
    {
        $request = $request->validate([
            'feedback_response' => 'required|string|max:255',
        ]);
        $complaint = Complaint::find($complaint_id);

>>>>>>> Stashed changes
        if (!$complaint) {
            return response()->json([
                'error' => 'Complaint not found',
            ], 404);
        }

<<<<<<< Updated upstream
=======
        $feedback = Feedback::create([
            'complaint_id'      => $complaint->id,
            'student_id'        => $complaint->student_id,
            'feedback_response' => $request['feedback_response'],
            'status'            => 'resolved',
            'date_at'           => now()->format('Y-m-d'),
        ]);
        
>>>>>>> Stashed changes
        $complaint->update([
            'status' => 'responded',
        ]);

<<<<<<< Updated upstream
        $feedback = Feedback::create([
            'complaint_id' => $complaint->id,
            'student_id' => $complaint->student_id,
            'feedback_response' => $request->feedback_response,
            'status' => 'responded',
            'date_at' => now()->format('Y-m-d'),
        ]);

        return response()->json([
            'message' => 'Complaint responded successfully',
            'complaint' => $complaint,
            'feedback' => $feedback,
        ], 200);
    }

    public function addFeedback(Request $request)
    {
        $complaint = Complaint::find($request->complaint_id);
        $feedback = Feedback::create([
            'complaint_id' => $complaint->id,
            'description' => $request->description,
            'date' => now()->format('Y-m-d'),
        ]);
        return response()->json([
            'message' => 'Feedback created successfully',
            'feedback' => $feedback,
=======
        return response()->json([
            'message'   => 'Complaint responded successfully',
            'feedback'  => $feedback,
        ], 201);
    }
    
    public function responseComplaint(Request $request, $complaint_id)
    {
        $request = $request->validate([
            'feedback_response' => 'required|string|max:255',
        ]);

        $complaint = Complaint::find($complaint_id);

        if (!$complaint) {
            return response()->json([
                'error' => 'Complaint not found',
            ], 404);
        }

        $feedback = Feedback::create([
            'complaint_id'      => $complaint->id,
            'student_id'        => $complaint->student_id,
            'feedback_response' => $request['feedback_response'],
            'status'            => 'responded',
            'date_at'           => now()->format('Y-m-d'),
        ]);
        
        $complaint->update([
            'status' => 'responded',
        ]);

        return response()->json([
            'message'   => 'Complaint responded successfully',
            'feedback'  => $feedback,
>>>>>>> Stashed changes
        ], 201);
    }

}
    