<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('layouts.dashboard', [
            'title' => 'Home'
        ]);
    }
}
