<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        \Log::info('Users fetched: ', ['count' => count($users)]); // Log user count
        return view('admin.users.index', compact('users'));
    }

}
