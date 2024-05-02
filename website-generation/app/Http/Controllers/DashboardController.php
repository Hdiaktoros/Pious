<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        // You can customize the data sent to the dashboard based on user roles or other criteria
        return view('dashboard', compact('user'));
    }


}
