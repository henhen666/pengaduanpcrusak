<?php

namespace App\Exports;

use App\Models\Laporan;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LaporanExport implements FromView
{
    public function view(): View
    {
        return view('dashboard.laporan.export', [
            'laporan' => Laporan::all()
        ]);
    }
}
