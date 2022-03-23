@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-8">
            @can('admin')
                <form action="{{ url('admin/dashboard/laporan') }}" method="get">
                @elsecan('users')
                    <form action="{{ url('user/dashboard/laporan') }}" method="get">
                    @endcan
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukkan ID perbaikan di sini..."
                            name="id_perbaikan">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="button-addon2"><i class="bi bi-search"></i>
                                Cari
                            </button>
                        </div>
                    </div>
                </form>
                @if (session()->has('success'))
                    <div class="my-3 alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
        </div>
        <div class="col-4">
            <a href="{{ url('admin/laporan/export') }}" class="btn btn-primary"><i
                    class="fas fa-solid fa-file-excel"></i>&nbsp; Export To Excel</a>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>No. Telpon</th>
                            <th>Kategori</th>
                            <th>Detail</th>
                            <th>Status</th>
                            <th>Dibuat pada</th>
                            <th>Diupdate pada</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laporan as $data)
                            <tr>
                                <td>{{ $data->id_perbaikan }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->handphone }}</td>
                                <td>{{ $data->category->name }}</td>
                                <td>{{ $data->detail }}</td>
                                <td>{{ $data->status->status }}</td>
                                <td>{{ $data->created_at->diffForHumans() }}</td>
                                <td>{{ $data->updated_at->diffForHumans() }}</td>
                                <td>
                                    @can('admin')
                                        <div class="d-flex">
                                            <form action="{{ url('user/dashboard/laporan/' . $data->id) }}" method="post"
                                                class="d-inline">
                                                @method("delete")
                                                @csrf
                                                <button type="submit" onclick="return confirm('Apakah Anda Yakin?')"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                            </form>
                                            <a href="{{ url('admin/dashboard/laporan/' . $data->id . '/edit') }}"
                                                class="btn btn-sm btn-warning mx-1"><i class="bi bi-pencil"></i></a>
                                        </div>
                                    @elsecan('users')
                                        @if ($data->status->status == 'Pending')
                                            <a href="{{ url('user/dashboard/laporan/' . $data->id . '/edit') }}"
                                                class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                        @elseif($data->status->status != 'Pending')
                                            <button disabled class="btn btn-warning btn-sm" data-toggle="tooltip"
                                                data-placement="top" title="Laporan hanya bisa diedit saat status Pending"><i
                                                    class="bi bi-pencil"></i>
                                            </button>
                                        @endif
                                    @endcan
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9">
                                    <h5 class="text-center">Tidak ada data ditemukan.</h5>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
