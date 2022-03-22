@extends('layouts.main')

@section('content')
    <div id="body-home">
        <div id="home-wrapper">
            <div class="jumbotron jumbotron-fluid mt-5">
                <div class="container">
                    @if (session()->has('logout'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('logout') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif (session()->has('failed'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('failed') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @elseif (session()->has('login'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('login') . auth()->user()->username }}!
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <h3 class="display-4">Selamat datang!</h3>
                    <p>Situs ini merupakan situs pelaporan kerusakan PC Anda. <br> Halaman ini digunakan untuk mengecek
                        status
                        perbaikan PC Anda.</p>
                    @auth
                        <a class="btn btn-primary btn-lg" href="{{ url('/dashboard/laporan') }}" target="_blank"
                            role="button">Cek
                            Proses Perbaikan
                            PC</a>
                    @endauth
                </div>
            </div>
            <div class="container">
                <h3 class="fw-bold text-center mb-3 text-white">Kenapa Pilih Kami?</h3>
                <div class="row justify-content-center">
                    <div class="card mr-2 mb-2 card-home" style="width: 16rem;">
                        {{-- <img src="{{ url('img/1.jpg') }}" class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">Keunggulan 1</h5>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste nihil
                                labore aperiam.</p>
                            <a href="#" class="btn btn-primary">Learn More...</a>
                        </div>
                    </div>
                    <div class="card mr-2 mb-2 card-home" style="width: 16rem;">
                        {{-- <img src="{{ url('img/2.jpg') }}" class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">Keunggulan 2</h5>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste nihil
                                labore aperiam.</p>
                            <a href="#" class="btn btn-primary">Learn More...</a>
                        </div>
                    </div>
                    <div class="card mr-2 mb-2 card-home" style="width: 16rem;">
                        {{-- <img src="{{ url('img/3.jpg') }}" class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">Keunggulan 3</h5>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste nihil
                                labore aperiam.</p>
                            <a href="#" class="btn btn-primary">Learn More...</a>
                        </div>
                    </div>
                    <div class="card mr-2 mb-2 card-home" style="width: 16rem;">
                        {{-- <img src="{{ url('img/4.jpg') }}" class="card-img-top" alt="..."> --}}
                        <div class="card-body">
                            <h5 class="card-title">Keunggulan 4</h5>
                            <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iste nihil
                                labore aperiam.</p>
                            <a href="#" class="btn btn-primary">Learn More...</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
