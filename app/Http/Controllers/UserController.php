<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $name = $users->name;
        $email = $users->email;

        return view('user.index', compact('name', 'email'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        return back()->with('success', 'User created successful!');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
       
    }
}