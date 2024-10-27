<?php

namespace App\Http\Controllers;

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
        return view('student.order', [
            'title' => 'Order Page',
        ]);
    }

    // complaint function
    public function complaint()
    {
        return view('student.complaint', [
            'title' => 'Complaint Page',
        ]);
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
            'title' => 'Profile Page',
        ]);
    }

    // track function
    public function track()
    {
        return view('student.track', [
            'title' => 'Track Page',
        ]);
    }

    // finance function
    public function finance()
    {
        return view('student.finance', [
            'title' => 'Finance Page',
        ]);
    }

    
}
