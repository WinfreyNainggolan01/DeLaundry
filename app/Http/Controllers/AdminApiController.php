<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Student;
use App\Models\Feedback;
use App\Models\Complaint;
use Illuminate\Http\Request;

class AdminApiController extends Controller
{

    public function getDashboard()
    {
        $total_student = Student::count();
        $total_order = Order::count();
        $total_complaint = Complaint::count();


        // masukkan data order per bulan kedalam model model 
        $order_per_month = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->get();
        $income_per_month = Order::selectRaw('MONTH(created_at) as month, SUM(total_price) as total')
            ->groupBy('month')
            ->get();

        return response()->json([
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
    {
        $total_complaint = Complaint::count();
        $total_complaint_responded = Complaint::where('status', 'responded')->count();
        $total_complaint_pending = Complaint::where('status', 'pending')->count();

        $complaints = Complaint::with('student')
            ->select('id', 'student_id', 'title', 'date', 'status', 'created_at')
            ->paginate(10);
        return response()->json([
            'complaints' => $complaints,
            'total_complaint' => $total_complaint,
            'total_complaint_responded' => $total_complaint_responded,
            'total_complaint_pending' => $total_complaint_pending,
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
        if (!$complaint) {
            return response()->json([
                'error' => 'Complaint not found',
            ], 404);
        }

        $complaint->update([
            'status' => 'responded',
        ]);

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
        ], 201);
    }

}
    