@extends('layouts.dashboard')

@section('content')
    @if (session()->has('login'))
        <div class="row">
            <div class="col-xl-12">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('login') . auth()->user()->username }}!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    @endif
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah PC yang Anda Laporkan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $laporan->count() }}</div>
                        </div>
                        <div class="col-auto">
                            {{-- <i class="fas fa-computer fa-2x text-gray-300"></i> --}}
                            <span class="fas fa-2x fa-solif fa-flag"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total PC Yang Sudah Diperbaiki</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $diperbaiki->count() }}</div>
                        </div>
                        <div class="col-auto">
                            {{-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> --}}
                            <span class="fas fa-2x fa-computer"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Total PC Yang Masih Pending</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pending->count() }}</div>
                        </div>
                        <div class="col-auto">
                            <span class="fas fa-2x fa-stopwatch"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total PC Yang Sedang Diperbaiki</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $process->count() }}</div>
                        </div>
                        <div class="col-auto">
                            {{-- <i class="fas fa-dollar-sign fa-2x text-gray-300"></i> --}}
                            <h2><i class="bi bi-tools"></i></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Laporan Terakhir</h6>
                </div>
                <div class="card-body">
                    @forelse ($latest as $laporan)
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">ID</label>
                            <div class="col-sm-9">
                                {{ $laporan->id_perbaikan }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                {{ $laporan->nama }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Handphone</label>
                            <div class="col-sm-9">
                                {{ $laporan->handphone }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Kategori</label>
                            <div class="col-sm-9">
                                {{ $laporan->category->name }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Detail</label>
                            <div class="col-sm-9">
                                {{ $laporan->detail }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Dibuat pada</label>
                            <div class="col-sm-9">
                                {{ $laporan->created_at->diffForHumans() }}
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-3 col-form-label">Diupdate pada</label>
                            <div class="col-sm-9">
                                {{ $laporan->updated_at->diffForHumans() }}
                            </div>
                        </div>
                    @empty
                        <h5>Tidak ada laporan terakhir yang dibuat</h5>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
