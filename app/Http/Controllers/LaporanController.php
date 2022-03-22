<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Laporan;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class LaporanController extends Controller
{
    public function index()
    {
        return view('lapor.lapor', [
            'title' => 'Buat Laporan',
            'categories' => Category::all(),
            'laporan' => Laporan::latest()
                ->matchuser()
                ->limit(1)
                ->get()
        ]);
    }

    public function create(Request $request)
    {
        $data = $request->validate([
            'id_perbaikan' => 'nullable',
            'nama' => 'required',
            'handphone' => 'required|numeric',
            'category_id' => 'required',
            'user_id' => 'required',
            'detail' => 'required|min:10|max:255',
            'status_id' => 'required'
        ]);
        $data['id_perbaikan'] = IdGenerator::generate(['table' => 'laporan', 'length' => '15', 'field' => 'id_perbaikan', 'prefix' => date('dmy') . 'LPPC-']);

        Laporan::create($data);
        return redirect("/lapor#sukses")->with('success', 'Laporan Anda Berhasil Disubmit!');
    }
}
