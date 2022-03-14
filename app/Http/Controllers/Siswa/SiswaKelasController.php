<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class SiswaKelasController extends Controller
{
    public function index()
    {
        $kelass = Kelas::get();

        return view('siswa.kelas.index', compact('kelass'));
    }

    public function show($id)
    {
        $siswas = User::where('kelas_id', $id)->get();
        $kelas = Kelas::findOrFail($id);
        return view('siswa.kelas.show', compact('kelas', 'siswas'));
    }
}
