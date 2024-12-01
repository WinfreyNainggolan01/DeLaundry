<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Student;
use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // dashboard function
    public function admin_dashboard()
    {
        return view('admin.dashboard',[
            // send total user in database 
            'total_user' => Student::count(),
            'total_order' => Order::count(),
            'total_complaint' => Complaint::count(),
        ]);
    }

    // user function
    public function admin_user()
    {
        return view('admin.user',[
            // send all data student to view
            // 'students' => Student::paginate(10),
            'students' => Student::all(),
            'total_user' => Student::count(),

        ]);
    }
    
    // order function
    public function admin_order()
    {
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
    {
        return view('admin.complaint', [
            'title' => 'Complaint Page',
        ]);
    }
}