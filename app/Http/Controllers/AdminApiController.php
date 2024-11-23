<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Student;
use App\Models\Complaint;
use Illuminate\Http\Request;

class AdminApiController extends Controller
{

    public function getDashboard()
    {
        $total_student = Student::count();
        $total_order = Order::count();
        $total_complaint = Complaint::count();

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
            ->select('id', 'name');
        return response()->json([
            'students' => $students->paginate(10),
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
        return response()->json([
            'order' => $order,
        ], 200);
    } 

    public function addDetailOrder(Request $request)
    {
        $order = Order::find($request->order_id);
        $total_price = $request->weight * 15000;
        $order->update([
            'weight' => $request->weight,
            'total_price' => $total_price,
        ]);
        return response()->json([
            'message' => 'Detail order updated successfully',
            'order' => $order,
        ], 200);
    }
    
    public function sendOrderNotification($order_id)
    {
        $order = Order::find($order_id);
        $order->student->notify(new OrderDoneNotify($order));
        return response()->json([
            'message' => 'Order notification sent successfully',
            'date_at' => now()->format('Y-m-d'),
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

    public function sendFeedbackNotification($complaint_id)
    {
        $complaint = Complaint::find($complaint_id);
        $complaint->student->notify(new FeedbackNotify ($complaint));
        return response()->json([
            'message' => 'Feedback notification sent successfully',
            'date_at' => now()->format('Y-m-d'),
        ], 200);
    }

}
    