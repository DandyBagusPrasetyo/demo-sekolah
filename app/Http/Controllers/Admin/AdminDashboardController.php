<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $adminCount = User::where('is_admin', true)->count();
        $siswaCount = User::where('is_admin', false)->count();
        $kelasCount = Kelas::count();

        $userBar = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck('count');


        return view('admin.dashboard.index', compact('adminCount', 'siswaCount', 'kelasCount', 'userBar'));
    }
}
