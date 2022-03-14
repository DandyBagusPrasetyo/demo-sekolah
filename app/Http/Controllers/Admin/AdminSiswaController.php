<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class AdminSiswaController extends Controller
{
    public function index()
    {
        //$siswas = Siswa::get();
        $siswas = User::where('is_admin', false)->get();

        return view('admin.siswa.index', compact('siswas'));
    }

    public function show($id)
    {
        $siswa = User::findOrFail($id);

        return view('admin.siswa.show', compact('siswa'));
    }

    public function create()
    {
        return view('admin.siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'nik' => ['required', 'unique:users'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required']
        ]);

        Siswa::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email
        ]);

        $user = User::create([
            'nik' => $request->nik,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        if ($user) {
            return redirect()->route('admin.siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('admin.siswa.index')->with(['success' => 'Data Gagal Disimpan!']);
        }
    }

    public function edit($id)
    {
        $siswa = User::findOrFail($id);
        $kelass = Kelas::get();

        return view('admin.siswa.edit', compact('siswa', 'kelass'));
    }

    public function update(Request $request, User $siswa)
    {
        $request->validate([
            'is_admin' => ['required'],
            'name' => ['required'],
            'nik' => 'required|unique:users,nik,' . $siswa->id,
            'phone' => ['required', 'numeric'],
            'email' => 'required|email|unique:users,email,' . $siswa->id,
            'kelas_id' => ['required'],
        ]);

        $siswa = Siswa::findOrFail($siswa->id);
        $siswa->update([
            'nik' => $request->nik,
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'kelas_id' => $request->kelas_id
        ]);

        if ($request->filled('password')) {
            $user = User::findOrFail($siswa->id);
            $user->update([
                'is_admin' => $request->is_admin,
                'nik' => $request->nik,
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'kelas_id' => $request->kelas_id,
                'password' => bcrypt($request->password)
            ]);
        } else {
            $user = User::findOrFail($siswa->id);
            $user->update([
                'is_admin' => $request->is_admin,
                'nik' => $request->nik,
                'name' => $request->name,
                'phone' => $request->phone,
                'kelas_id' => $request->kelas_id,
                'email' => $request->email
            ]);
        }

        if ($user) {
            return redirect()->route('admin.siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            return redirect()->route('admin.siswa.index')->with(['success' => 'Data Gagal Disimpan!']);
        }
    }

    public function destroy($id)
    {
        $siswa1 = Siswa::findOrFail($id);
        $siswa1->delete();

        $siswa = User::findOrFail($id);
        $siswa->delete();

        if ($siswa) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
