<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Usercontroller extends Controller
{
    public function index()
    {
        $data = User::all();
        return view('admin.user', compact('data'));
    }
    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }
    public function edit($id)
        {
            $user = User::findOrFail($id);
            return view('admin.edit', compact('user'));
        }

    public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'password' => 'nullable|string|min:8',
            ]);

            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;

            if ($request->password) {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
        }

        public function destroy($id)
            {
                $user = User::findOrFail($id);
                $user->delete();

                return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
            }


}