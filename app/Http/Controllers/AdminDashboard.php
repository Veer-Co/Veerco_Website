<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDashboard extends Controller
{
    public function login()
    {
        return view('admin/auth/login');
    }

    public function dashboard()
    {
        return view('admin/dashboard');
    }
}
