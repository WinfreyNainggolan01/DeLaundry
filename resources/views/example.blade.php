@extends('layout/layout')
    
@section('head')
    <style>
        .card-login {
            width: 500px;
            margin-top: 100px
        }

        .navbar {
            background-color: cornflowerblue;
            padding-left: 100px;
            padding-right: 100px;
        }

        .card-custom {
            width: 100vh;
        }

    </style>
@endsection
    
@section('content')
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Navbar</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
              </li>
            </ul>
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a href="{{ url('logout') }}" class="btn btn-danger ms-3">Logout</a>
          </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-center mt-5">
        <div class="card-custom border rounded-0 p-3">
            <h1 class="fs-1 fw-bold text-center">Selamat Datang, {{ session('name') }}!</h1>
        </div>
    </div>
@endsection
