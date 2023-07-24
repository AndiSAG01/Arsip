<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class SupUserController extends Controller
{
    public function store(UserRequest $request)
    {
        user::insert([
            'nik' => $request->nik,
            'nip' => $request->nip,
            'slug' => Str::slug($request->name),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password'),
            'address' => $request->address,
            'telp' => $request->telp,
            'birthday' => $request->birthday,
            'isAdmin' => 1,
        ]);

        return back()->with('success', 'Tambah petugas telah ditambah 😎');
    }

    public function edit($slug)
    {
        return view('supUser.update', [
            'user' => User::whereSlug($slug)->first()
        ]);
    }

    public function update(Request $request, $slug)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'nik' => 'required|min:16',
            'nip' => 'required|min:9',
            'name' => 'required|min:5',
            'address' => 'required|min:8',
            'telp' => 'required|numeric|digits_between:11,12',
            'birthday' => 'required|date_format:Y-m-d',
        ]);


        User::whereSlug($slug)->update([
            'nik' => $request->nik,
            'nip' => $request->nip,
            'slug' => Str::slug($request->name),
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password'),
            'address' => $request->address,
            'telp' => $request->telp,
            'birthday' => $request->birthday,
            'isAdmin' => 1,
        ]);

        return redirect('superadmin')->with('success', 'Ubah data Berhasil 😊');
    }

    public function destroy($slug)
    {
        User::whereSlug($slug)->delete();
        return back()->with('success', 'Hapus data Berhasil 👏');
    }
}
