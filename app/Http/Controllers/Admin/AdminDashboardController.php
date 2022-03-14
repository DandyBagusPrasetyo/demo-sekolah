<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $adminCount = User::where('is_admin', true)->count();
        $siswaCount = User::where('is_admin', false)->count();
        $kelasCount = Kelas::count();
        return view('admin.dashboard.index', compact('adminCount', 'siswaCount', 'kelasCount'));
    }
}
