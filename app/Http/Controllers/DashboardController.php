<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.home.index', [
            'title' => 'Home',
            'laporan' => Laporan::matchuser()->get(),
            'latest' => Laporan::latest()->limit(1)->get(),
            'diperbaiki' => Laporan::matchuser()->where('status_id', 3)->get(),
            'pending' => Laporan::where('status_id', 1)->get(),
            'process' => Laporan::where('status_id', 2)->get()
        ]);
    }
}
