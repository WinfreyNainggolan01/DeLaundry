<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        // return view('homepage', [
        //     'title' => 'Home Page',
        // ]);
        return view('student.homepage', [
            'title' => 'Home Page',
        ]);
        
    }
}
