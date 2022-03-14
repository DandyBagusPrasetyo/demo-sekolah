<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class AdminKelasController extends Controller
{
    public function index()
    {
        $kelass = Kelas::get();

        return view('admin.kelas.index', compact('kelass'));
    }

    public function show($id)
    {
        $siswas = User::where('kelas_id', $id)->get();
        $kelas = Kelas::findOrFail($id);
        return view('admin.kelas.show', compact('kelas', 'siswas'));
    }

    public function create()
    {
        return view('admin.kelas.create');
    }

    public function store(Request $request)
    {
        foreach ($request->input('name') as $key => $value) {
            $kelas = new Kelas;
            $kelas->name = $request->get('name')[$key];
            $kelas->save();
        }

        return redirect()->route('admin.kelas.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        return view('admin.kelas.edit', compact('kelas'));
    }

    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        if ($kelas) {
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
