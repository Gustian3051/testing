<?php

namespace App\Http\Controllers\WEB\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);



        if (Auth::guard('admindanstaff')->attempt(['username' => $request->username, 'password' => $request->password])) {
            $user = Auth::guard('admindanstaff')->user();

            // Mengecek role
            if ($user && $user->hasRole('Admin')) {
                return redirect()->route('dashboard.index');
            } elseif ($user && $user->hasRole('Staff')) {
                return redirect()->route('dashboard.index');
            }
        }

        return back()->withErrors(['username' => 'Username atau password salah']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}