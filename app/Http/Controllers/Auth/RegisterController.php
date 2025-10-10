<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('penjual.registrasi'); // arahkan ke blade yg kamu buat
    }

    public function register(Request $request)
    {
       $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'store_name'  => 'required|string|max:255',
            'email'       => 'required|email|unique:users,email',
            'phone'       => 'required|string|unique:users,phone',
            'password'    => 'required|min:8|confirmed',
            'latitude'    => 'nullable|numeric|between:-90,90',
            'longitude'   => 'nullable|numeric|between:-180,180',
        ]);

        User::create([
            'name'       => $validated['name'],
            'store_name' => $validated['store_name'],
            'email'      => $validated['email'],
            'phone'      => $validated['phone'],
            'password'   => Hash::make($validated['password']),
            'latitude'   => $request->latitude,
            'longitude'  => $request->longitude,
        ]);

        return redirect('/penjual/login')->with('success', 'Registrasi berhasil, silakan login!');
        // return redirect()->route('login.form')->with('success', 'Registrasi berhasil, silakan login!');

    }
}
