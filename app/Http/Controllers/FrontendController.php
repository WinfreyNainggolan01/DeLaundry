<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Item;
use App\Models\Order;
use App\Models\Student;
use Illuminate\Http\Request;

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

        // penambahan item dari user ketika tombol add dilakukan. item ditambahkan kedalam tabel dan akan menampilkan item yang ditambahkan ke dalam tabel
        $request->validate([
            // name, quantity, note
            'name-item' => 'required|string|max:100',
            'quantity' => 'required|integer',
            'note' => 'nullable|string|max:200',
        ]);

        $student = auth()->guard('student')->user();

        Item::create([
            'name' => $request->input('name-item'),
            'quantity' => $request->input('quantity'),
            'note' => $request->input('note') ? $request->input('note') : '-',
            'student_id' => $student->id,
        ]);

        return redirect()->back()->with('success', 'Item added successfully');

    }

    public function editItem(Request $request, $id)
    {
        // edit item berdasarkan tombol edit yang ada di kolom action dan akan menampilkan popup modal
        $request->validate([
            'name-item' => 'required|string|max:100',
            'quantity' => 'required|integer',
        ]);

        $item = Item::findOrFail($id);
        $item->update([
            'name' => $request->input('name-item'),
            'quantity' => $request->input('quantity'),
            'note' => $request->input('note') ? $request->input('note') : '-',
        ]);

        return redirect()->back()->with('success', 'Item updated successfully');
    }

    // delete item from action in table item
    public function deleteItem($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Item deleted successfully');
    }


    public function done()
    {
        $student = auth()->guard('student')->user();

        $order = Order::create([
            'ordx_id' => '-',
            'date' => now()->format('Y-m-d'),
            'student_id' => $student->id,
            'dormitory_id' => $student->dormitory_id,
        ]);

        $items = Item::where('student_id', $student->id)->get();
        foreach ($items as $item) {
            $order->itemOrders()->create([
                'item_id' => $item->id,
                'quantity' => $item->quantity,
            ]);
        }

        return redirect()->route('order.summary')->with('success', 'Order completed');
    }

    public function complaint()
    {
        return view('student.complaint', [
            'title' => 'Create Complaint',
        ]);
    }

    public function createComplaint(Request $request){
        $request->validate([
            'order-id' => 'required|string|max:12',
            'title' => 'required|string|max:200',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string|max:500',
        ]);

        Complaint::create([
            'order_id' => $request->input('order-id'),
            'title' => $request->input('title'),
            'image' => $request->input('image'),
            'description' => $request->input('description'),
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
        return view('student.profile', [
            'title' => 'Profile',
        ]);
    }

    // track function
    public function track()
    {
        return view('student.track', [
            'title' => 'Track',
        ]);
    }

    // finance function
    public function finance()
    {
        return view('student.finance', [
            'title' => 'Finance',
        ]);
    }

    
}
