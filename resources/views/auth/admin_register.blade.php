@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Register Here!</h1>
                            </div>
                            <form class="user" autocomplete="off" method="POST"
                                action="{{ url('admin/register') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-user @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" id="exampleInputEmail"
                                        placeholder="Enter Email Address">
                                    @error('email')
                                        <div class="invalid-feedback pl-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text"
                                        class="form-control form-control-user @error('username') is-invalid @enderror"
                                        name="username" value="{{ old('username') }}" id="exampleInputEmail"
                                        placeholder="Enter Username">
                                    @error('username')
                                        <div class="invalid-feedback pl-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-user @error('password') is-invalid @enderror"
                                        name="password" id="exampleInputEmail" placeholder="Enter Password">
                                    @error('password')
                                        <div class="invalid-feedback pl-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <input type="hidden" name="is_admin" value="1">
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="{{ url('admin') }}">Already have an account? Sign In</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
