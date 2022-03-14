<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaProfileController extends Controller
{
    public function index()
    {
        return view('siswa.profile.index');
    }

    public function edit()
    {
        return view('siswa.profile.edit');
    }

    public function update(Request $request, User $siswa)
    {
        $request->validate([
            'name' => ['required'],
            'nik' => 'required|unique:users,nik,' . $siswa->id,
            'phone' => ['required', 'numeric'],
            'email' => 'required|email|unique:users,email,' . $siswa->id
        ]);

        $siswa = Siswa::findOrFail($siswa->id);
        $siswa->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);

        if ($request->filled('password')) {
            $user = User::findOrFail($siswa->id);
            $user->update([
                'nik' => $request->nik,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
        } else {
            $user = User::findOrFail($siswa->id);
            $user->update([
                'nik' => $request->nik,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email
            ]);
        }

        if ($user) {
            return redirect()->route('siswa.profile.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('siswa.profile.index')->with(['success' => 'Data Gagal Disimpan!']);
        }
    }
}
