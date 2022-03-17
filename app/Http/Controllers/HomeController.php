<?php

namespace App\Http\Controllers;

use App\Models\Laporan;

class HomeController extends Controller
{
    public function index()
    {
        return view('home.home', [
            'title' => 'Home',
            'data' => Laporan::search(request(['id_perbaikan']))->first()
        ]);
    }
}
