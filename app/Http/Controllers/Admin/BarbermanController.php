<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Barberman;

class BarbermanController extends Controller
{
    public function index() {
        return view('admin.barberman.index', [
            'barbermen' => Barberman::all()
        ]);
    }

    public function create() {
        return view('admin.barberman.create');
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'barberman_name'      => 'required|max:50',
            'barberman_username'  => 'required|min:4|max:50|unique:barbermen',
            'barberman_email'     => 'required|email:dns|unique:barbermen',
            'barberman_telephone' => 'required|max:15',
            'barberman_address'   => 'required|max:255',
        ]);

        $barberman_telephone = $validatedData['barberman_telephone'];

        $barberman_telephone = str_replace(" ", "", $barberman_telephone);
        $barberman_telephone = str_replace("(", "", $barberman_telephone);
        $barberman_telephone = str_replace(")", "", $barberman_telephone);
        $barberman_telephone = str_replace(".", "", $barberman_telephone);
    
        if (!preg_match('/[^+0-9]/', trim($barberman_telephone))) {
            if (substr(trim($barberman_telephone), 0, 2) == '62') {
                $validatedData['barberman_telephone'] = trim($barberman_telephone);
            }
            elseif (substr(trim($barberman_telephone), 0, 1) == '0') {
                $validatedData['barberman_telephone'] = '62' . substr(trim($barberman_telephone), 1);
            }
        }

        Barberman::Create($validatedData);

        return redirect('/admin/barberman')->with('success', 'New barberman has been added!');
    }

    public function edit(Barberman $barberman) {
        return view('admin.barberman.edit', [
            'barberman' => $barberman
        ]);
    }

    public function update(Request $request, Barberman $barberman) {
        $validatedData = $request->validate([
            'barberman_name'        => 'required|max:50',
            'barberman_username'    => 'required|min:4|max:50',
            'barberman_email'       => 'required|email:dns',
            'barberman_telephone'   => 'required|max:15',
            'barberman_address'     => 'required|max:255',
        ]);

        $barberman_telephone = $validatedData['barberman_telephone'];

        $barberman_telephone = str_replace(" ", "", $barberman_telephone);
        $barberman_telephone = str_replace("(", "", $barberman_telephone);
        $barberman_telephone = str_replace(")", "", $barberman_telephone);
        $barberman_telephone = str_replace(".", "", $barberman_telephone);
    
        if (!preg_match('/[^+0-9]/', trim($barberman_telephone))) {
            if (substr(trim($barberman_telephone), 0, 2) == '62') {
                $validatedData['barberman_telephone'] = trim($barberman_telephone);
            }
            elseif (substr(trim($barberman_telephone), 0, 1) == '0') {
                $validatedData['barberman_telephone'] = '62' . substr(trim($barberman_telephone), 1);
            }
        }

        Barberman::where('barberman_id', $barberman->barberman_id)->update($validatedData);
        
        return redirect('/admin/barberman')->with('success', 'Barberman has been updated!');
    }

    public function delete(Barberman $barberman) {

        Barberman::where('barberman_id', $barberman->barberman_id)->delete();
        return redirect('/admin/barberman')->with('success', 'Barberman has been deleted!');
    }
}
