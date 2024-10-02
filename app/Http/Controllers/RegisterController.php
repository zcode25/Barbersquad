<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name'      => 'required|max:50',
            'username'  => 'required|min:4|max:50|unique:users',
            'email'     => 'required|email:dns|unique:users',
            'telephone' => 'required|max:15',
            'password'  => 'required|min:8|max:50',
            'address'   => 'required|max:255',
        ]);

        $telephone = $validatedData['telephone'];

        $telephone = str_replace(" ", "", $telephone);
        $telephone = str_replace("(", "", $telephone);
        $telephone = str_replace(")", "", $telephone);
        $telephone = str_replace(".", "", $telephone);
    
        if (!preg_match('/[^+0-9]/', trim($telephone))) {
            if (substr(trim($telephone), 0, 2) == '62') {
                $validatedData['telephone'] = trim($telephone);
            }
            elseif (substr(trim($telephone), 0, 1) == '0') {
                $validatedData['telephone'] = '62' . substr(trim($telephone), 1);
            }
        }

        $validatedData["password"] = Hash::make($validatedData["password"]);

        User::Create($validatedData);

        return redirect('/')->with('success', 'Registration successfull! Please login');
    }
}
