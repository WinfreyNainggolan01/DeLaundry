<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        return view('admin.user',[
            // send all data student to view
            // 'students' => Student::paginate(10),
            'students' => Student::all(),
            'total_user' => Student::count(),

        ]);
    }
}
