<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserManagementController extends Controller
{
    public function index(){
        $admins = User::where('role', 'admin')->get();
        return view('halaman.daftarAdmin', ['daftarAdmin'=>$admins]);
    }

    public function create(){
        return view('halaman.formAdmin');
    }

    public function store(Request $request){
        // Validasi input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // Buat user baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin', // <-- PENTING: Set role sebagai 'admin'
        ]);

        // Redirect kembali ke halaman daftar admin
        return redirect()->route('admin.users.index')
                         ->with('success', 'Admin baru berhasil ditambahkan.');
    }
}
