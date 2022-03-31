<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Category;
use App\Models\Status;
use Illuminate\Http\Request;

class DashboardLaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.laporan.index', [
            'title' => 'Laporan',
            'laporan' => Laporan::latest()
                ->search(request(['id_perbaikan']))
                ->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function show(Laporan $laporan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function edit(Laporan $laporan)
    {
        return view('dashboard.laporan.edit', [
            'title' => 'Edit Laporan',
            'laporan' => $laporan,
            'category' => Category::all(),
            'status' => Status::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laporan $laporan)
    {
        if ($request->status) {
            Laporan::whereRaw('id = ?', [$laporan->id])
                ->update(['status_id' => $request->status]);
            return redirect('user/dashboard/laporan')->with('success', 'Laporan Berhasil Diubah');
        }

        $data = $request->validate([
            'handphone' => 'string',
            'category_id' => 'numeric',
            'detail' => 'string|min:10|max:255',
        ]);

        Laporan::whereRaw('id = ?', [$laporan->id])
            ->update($data);
        return redirect('user/dashboard/laporan')->with('success', 'Laporan Anda Berhasil Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Laporan  $laporan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laporan $laporan)
    {
        Laporan::destroy($laporan->id);
        return back()->with('success', 'Data Berhasil Dihapus!');
    }
}
