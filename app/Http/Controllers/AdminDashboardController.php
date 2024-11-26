<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        
        return view('admin.dashboard',[
            // send total user in database 
            'total_user' => Student::count(),
        ]);
        
    }
}
