<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('user.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email'=> 'required|unique:users|email',
            'password' => 'required|string|min:8|max:16'
        ]);
        
        User::create($request->only(['name', 'email', 'password']));

        return redirect()->route('user.index');
    }
}
