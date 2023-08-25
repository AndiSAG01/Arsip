<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id)
    {
        return view('auth.profile', [
            'user' => User::find($id),
        ]);
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth()->user()->id,
            'nik' => 'required|min:16|unique:users,nik,'.Auth()->user()->id,
            'nip' => 'required|min:9|unique:users,nip,'.Auth()->user()->id,
            'name' => 'required|min:5',
            'address' => 'required|min:8',
            'telp' => 'required|numeric|digits_between:10,13|unique:users,telp,'.Auth()->user()->id,
            'birthday' => 'required',
        ]);

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'telp' => $request->telp,
            'address' => $request->address,
            'nik' => $request->nik,
            'nip' => $request->nip,
            'birthday' => $request->birthday,

        ]);
        return back()->with('success', 'Profile berhasil diperbarui');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->confirmAccount == 'on') {
            # code...
            $user = User::find($id);
            $user->delete();
            return redirect('/');
        }
        return back();
    }
}
