@extends('layouts.dashboard')

@section('content')
    @if (session()->has('success'))
        <div class="row" id="sukses">
            <div class="col-xl-8 col-lg-8 col-md-10 col-sm-12">
                <div class="my-3 alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
    @endif
    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-10 col-sm-12">
            <div class="card border-secondary mb-3">
                <div class="card-body text-secondary">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5">Email</label>
                        <div class="col-sm-7">
                            {{ $user[0]->email }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5">Username</label>
                        <div class="col-sm-7">
                            {{ $user[0]->username }} &nbsp;
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5">Dibuat pada</label>
                        <div class="col-sm-7">
                            {{ $user[0]->created_at->diffForHumans() }}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5">Terakhir diupdate pada</label>
                        <div class="col-sm-7">
                            {{ $user[0]->updated_at->diffForHumans() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
