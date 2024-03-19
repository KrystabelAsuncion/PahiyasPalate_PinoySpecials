<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function AdminDashboard()
    {
        $userCount = User::count();
        return view('Admin.admin-dashboard',['userCount' => $userCount]);
    }

    public function AdminLogin()
    {
        return view('Admin.admin-login');
    }

    public function AdminRegister()
    {
        return view('Admin.admin-register');
    }

}
