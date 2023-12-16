<!doctype html>
<html lang="en">

<head>
    <title>{{ $title }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="{{ URL::asset('assets/css/bootstrap.css') }}" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
   <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Vendor CSS Files -->
<link href="{{ URL::asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/vendor/aos/aos.css" rel="stylesheet') }}">
<link href="{{ URL::asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ URL::asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('fontawesome-free-6.4.2-web/css/all.min.css') }}">
    <link rel="icon" href="{{ URL::asset('assets/images/logo.jpg') }}" type="image/png">

    
</head>

<body>
    <header>
        <!-- place navbar here -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}"><img class="logo"
                        src="{{ URL::asset('assets/images/logo.jpg') }}" alt="logo"></a>
                <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavId">
                    <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.dashboard') }}"
                                aria-current="page">Dashboard <span class="visually-hidden">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.adminMenu') }}">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.category') }}">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.orders') }}">Orders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.user') }}">Users</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.inventory') }}">Inventory</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.events') }}">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.orderdetails') }}">Report</a>
                        </li>
                    </ul>
                    <div class="dropdown open">
                        <button class="btn text-white dropdown-toggle" type="button" id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                    {{ Auth::user()->fname }}
                                </button>
                        <div class="dropdown-menu" aria-labelledby="triggerId">
                            <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                    
                                <input type="submit" value="{{ __('Log Out') }}" class="btn">
                                    
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        
    </header>
