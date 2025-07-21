<?php

namespace App\Http\Controllers;

use App\Models\Formulir;
use Illuminate\Http\Request;
use function Laravel\Prompts\form;

class Formulircontroller extends Controller
{
    public function index(){
        return view('user.index');
    }

    public function store(Request $request)
    {
        // Validasi data formulir
        $validate = $request->validate([
            'name' => 'required|',
            'alamat' => 'required',
            'pendidikan' => 'required',
            'reason' => 'required|string',
        ]);

        // Simpan data ke dalam database
        Formulir::create($validate);
        // Redirect ke halaman dengan pesan sukses
        return redirect()->route('formulir')->with('success', 'Data berhasil disimpan!');
    }



}