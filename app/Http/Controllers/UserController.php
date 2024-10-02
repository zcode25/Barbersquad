<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(User $user) {
        return view('user.profile', [
            'user' => $user
        ]);        
    }

    public function update(Request $request, User $user) {
        $validatedData = $request->validate([
            'name'        => 'required|max:50',
            'username'    => 'required|min:4|max:50',
            'email'       => 'required|email:dns',
            'telephone'   => 'required|max:15',
            'address'     => 'required|max:255',
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

        User::where('id', $user->id)->update($validatedData);
        
        return redirect('/profile/'. $user->id);
    }
}