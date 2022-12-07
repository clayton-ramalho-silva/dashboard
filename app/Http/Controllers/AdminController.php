<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $data = ['user' => $user];


        return view('admin.dashboard', $data);
    }

    public function users_profile()
    {
        $user = Auth::user();

        $data = ['user' => $user];

        return view('admin.users-profile', $data);
    }
}
