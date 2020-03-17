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

<body class="">
    <div class="container-fluid" style="">
        <div class="row " style="min-height: 100vh;background-color: #2a283d">
         
            <div class="col col-lg-12 col-sm-12">
                <div class="container pt-5">
                    <div class="row">
                        <div class="col text-white text-center">
                            <div class="welcome-message">Welcome to Micro Blogging</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-lg-6">
                            
                            <div class="card-front text-center">
                                <i class="fa fa-comments "></i>
                                <h2>POST NOTE</h2>
                            </div>
                            
                        </div>
                        <div class="col col-lg-6">
                            <div class="card-front text-center">
                                <i class="fa fa-shopping-cart"></i>
                                <h2>MARKET PLACE</h2>
                            </div>
                        </div>
                        <!-- <div class="col col-lg-4">
                            <div class="card">
                              <div class="card-body card-front text-center">
                                <i class="fa fa-comments"></i>
                                <h2>POST NOTE</h2>
                              </div>
                            </div>
                        </div> -->
                        <div class="col col-lg-12">
                            <h1><a class="badge badge-primary btn-block" id="btnregister" href="{{url('/login')}}">STARTS HERE :)</a></h1>
                        </div>
                        <div class="col col-lg-12 text-white text-center">
                            &copy copyrights Reza - 2019
                        </div>
                        <div class="col col-lg-12 pt-5">
                            <blockquote class="blockquote text-center">
                             
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col col-lg-2 d-none d-lg-block">
                
            </div>
        </div>
    </div>
</body>

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
    })
</script>
@endsection

