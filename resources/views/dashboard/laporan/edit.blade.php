@extends('layouts.dashboard')

@section('content')
    <div class="row">
        <div class="col-xl-10 col-lg-10 col-md-12 col-sm-12">
            @can('users')
                <button class="btn btn-danger mb-3" data-toggle="modal" data-target="#cancel"><i class="bi bi-x-lg"></i>&nbsp;
                    Batalkan Laporan</button>
                <form action="{{ url('user/dashboard/laporan/' . $laporan->id) }}" method="post">
                    @method('put')
                    @csrf
                    <div class="form-group row mb-3">
                        <label for="staticEmail" class="col-sm-3 col-form-label">ID Perbaikan</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" readonly name="id_perbaikan"
                                value="{{ $laporan->id_perbaikan }}">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Nama Lengkap</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control-plaintext" readonly name="nama"
                                value="{{ $laporan->nama }}">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="staticEmail" class="col-sm-3 col-form-label">No. Telpon</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control @error('handphone') is-invalid @enderror" name="handphone"
                                value="{{ old('handphone', $laporan->handphone) }}">
                            @error('handphone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Kategori Kerusakan</label>
                        <div class="col-sm-9">
                            <select class="custom-select @error('category_id') is-invalid @enderror" name="category_id">
                                @if ($laporan->category->name)
                                    <option selected value="{{ $laporan->category->name }}">{{ $laporan->category->name }}
                                    </option>
                                    @foreach ($category as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error('category_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Detail Kerusakan</label>
                        <div class="col-sm-9">
                            <textarea name="detail" cols="30" rows="10"
                                class="form-control @error('detail') is-invalid @enderror">{{ old('detail', $laporan->detail) }}</textarea>
                            @error('detail')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary float-right">Update</button>
                </form>
            @elsecan('admin')
                <div class="form-group row mb-3">
                    <label for="staticEmail" class="col-sm-3">ID Perbaikan</label>
                    <div class="col-sm-9">
                        {{ $laporan->id_perbaikan }}
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="staticEmail" class="col-sm-3">Nama Lengkap</label>
                    <div class="col-sm-9">
                        {{ $laporan->nama }}
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="staticEmail" class="col-sm-3">No. Telpon</label>
                    <div class="col-sm-9">
                        {{ $laporan->handphone }}
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="staticEmail" class="col-sm-3">Kategori Kerusakan</label>
                    <div class="col-sm-9">
                        {{ $laporan->category->name }}
                    </div>
                </div>
                <div class="form-group row mb-3">
                    <label for="staticEmail" class="col-sm-3">Detail Kerusakan</label>
                    <div class="col-sm-9">
                        {{ $laporan->detail }}
                    </div>
                </div>
                @method("PUT")
                <div class="form-group row mb-3">
                    <label for="staticEmail" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <form action="{{ url('admin/dashboard/laporan/' . $laporan->id) }}" method="post">
                            @method('put')
                            @csrf
                            <select name="status" class="custom-select">
                                <option selected value="{{ $laporan->status->id }}">{{ $laporan->status->status }}
                                </option>
                                @forelse ($status as $status)
                                    <option value="{{ $status->id }}">{{ $status->status }}</option>
                                @empty
                                    <option value="">--TIDAK ADA STATUS--</option>
                                @endforelse
                            </select>
                            <button type="submit" class="btn btn-primary mt-4">Ubah Status</button>
                        </form>
                    </div>
                </div>
            @endcan
        </div>
    </div>
@endsection
<div class="modal fade" id="cancel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Dengan Anda mengklik "Oke", maka Laporan Anda akan dibatalkan
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="{{ url('user/dashboard/laporan/' . $laporan->id) }}" method="post">
                    @method('put')
                    @csrf
                    <input type="hidden" name="status" value="Dibatalkan">
                    <button type="submit" class="btn btn-danger">Oke</button>
                </form>
            </div>
        </div>
    </div>
</div>
