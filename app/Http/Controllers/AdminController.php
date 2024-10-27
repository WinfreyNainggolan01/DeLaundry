<?php

namespace App\Http\Controllers;

use App\Models\Student;
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
        return view('admin.order', [
            'title' => 'Order Page',
        ]);
    }

    // complaint function
    public function admin_complaint()
    {
        return view('admin.complaint', [
            'title' => 'Complaint Page',
        ]);
    }
}