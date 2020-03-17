<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ isset($title) ? $title : config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('bootstrap-4.3.1-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('dist/summernote-bs4.css') }}" rel="stylesheet">
    <link href="{{ asset('css/quote.css') }}" rel="stylesheet">


    
</head>
<body class="pb-5">
   <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #2a283d;">
      <a class="navbar-brand text-white" href="#">{{ config('app.name') }}</a>
      <button class="navbar-toggler bg-white" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link text-white" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="{{url('/post-note')}}"> Post Note</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
             <i class="fa fa-shopping-cart"></i> Market Place
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{url('/product')}}">Product</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
            <!-- Authentication Links -->
            @if (Auth::guest())
                <!-- <li class="nav-item"><a href="{{ route('login') }}" class="nav-link text-white">Login</a></li>
                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link text-white">Register</a></li> -->
            @else
                <li class="nav-item user-picture d-none d-lg-block">
                  <img src="{{asset('picture/codeigniter.jpeg')}}" alt="codeigniter" class="rounded-circle" width="25" height="25">
                </li>
                <li class="nav-item dropdown">

                    <a href="#" class="nav-link dropdown-toggle text-white" data-toggle="dropdown" role="button" aria-expanded="false">
                      {{ ucwords(Auth::user()->name) }} <span class="badge badge-light">4</span><span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                           <a class="dropdown-item" href="{{ url('profile', Auth::user()->username)}}"><i class="fa fa-user"></i> Profile</a>
                           <a class="dropdown-item" href="#"><i class="fa fa-lock"></i> Change Password</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> Logout
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
      </div>
    </nav>
    @yield('content')
</body>


@extends('layouts/footer')

