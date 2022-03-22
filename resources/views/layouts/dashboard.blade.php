<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ $title }} | Dashboard Laporan Kerusakan PC</title>
    <link href="{{ url('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway&family=Roboto+Slab:wght@400;700&display=swap"
        rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="{{ url('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: 'Raleway';
        }

    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        @include('dashboard.components.sidebar')
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                @include('dashboard.components.navbar')
                <div class="container-fluid">
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
                    </div>
                    @yield('content')
                </div>
            </div>
            @include('dashboard.components.footer')
        </div>
    </div>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    @include('components.logout')
    </div>
    <script src="https://kit.fontawesome.com/27ce9fb29a.js" crossorigin="anonymous"></script>
    <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ url('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ url('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ url('vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ url('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ url('js/demo/chart-pie-demo.js') }}"></script>
</body>

</html>
