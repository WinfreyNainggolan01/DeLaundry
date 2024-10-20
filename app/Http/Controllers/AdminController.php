<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() 
    {
        echo "Hallo, Admin";
        echo "<h1>". Auth::user()->name ."</h1>";
        echo "<a href='/logout' class='btn btn-danger ms-3'>Logout</a></div>";
    }

    public function operator() 
    {
        echo "Hallo, Operator!";
        echo "<h1>". Auth::user()->name ."</h1>";
        echo "<a href='/logout' class='btn btn-danger ms-3'>Logout</a></div>";
    }

    public function user() 
    {
        echo "Hallo, User!";
        echo "<h1>". Auth::user()->name ."</h1>";
        echo "<a href='/logout' class='btn btn-danger ms-3'>Logout</a></div>";
    }

    public function checkrole() {
        echo "Role : ",Auth::user()->role;
    }
}