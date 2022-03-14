<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaDashboardController extends Controller
{
    public function index()
    {
        $kelasCount = Kelas::count();
        return view('siswa.dashboard.index', compact('kelasCount'));
    }
}
