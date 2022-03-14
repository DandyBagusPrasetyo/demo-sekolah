<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaKelasController extends Controller
{
    public function index()
    {
        $kelass = Kelas::get();

        return view('siswa.kelas.index', compact('kelass'));
    }
}
