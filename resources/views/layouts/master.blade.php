<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Blog') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{ url('/assets/bootstrap.min') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/libs/jquery-ui/jquery-ui.min.css') }}" type="text/css" />
    <link rel="stylesheet" href="{{ url('/libs/jquery-confirm/jquery-confirm.min.css') }}" type="text/css" />

    @yield('style')
    <style type="text/css">

    .navbar .navbar-brand {
        font-family: 'Lobster', cursive;
        font-size: 2.5rem;
            }
    .main-category a, .main-category a:hover
    {
        text-decoration: none !important;
    }
    .sub-category a:hover{
        text-decoration: none !important;
        color: #92bdff;
    }
    li.active .main-category a, li.active .main-category a:hover
    {
        color: #609FFF;
    }
    .nav-catergories:hover li.active .sub-category, .nav-catergories:hover li .cateogry-name
    {
        display: contents;
    }
    .sub-category, .cateogry-name{
        display: none;
    }
    .main-category{
        text-align: left;
        text-align: left;
        padding: 45px 25px;
        padding-bottom:10px;
    }
    .main-category a{
        color:#000000!important
    }   
    
    .navbar-nav{
        color : #000000;
        margin-right:20px;

    }      


    </style>
</head>
<body>
<div id="app">

    <div class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container" style="margin-left: 20px;margin-right: 20px;padding-right: 15px;min-width: calc(100% - 70px)!important;">
            <a class="navbar-brand" href="{{ url('/homepage/main')}}" style="font-size: 30px;color:#611707" >
                <img src="{{ url("/assets/cat.png") }}" alt="first" style="display:inline-block;width:100px; height:80px">
                {{ config('app.name', 'KiKi Blog') }}
            </a>



            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>
       
      


                


                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                     
                    @guest
                     <img src="{{ url("/assets/icon07.png") }}" alt="first" style="display:inline-block;width:170px; height:70px;margin-right: 40px">


                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}"style="font-size:18px">{{ __('Login') }}</a>
                        </li>

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}"style="font-size:18px">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
        <div id="main-nav" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li><a href="#" class="nav-item nav-link" style=" margin-right:20px;font-size: 18px">Home</a></li>
                <li><a href="{{ url('/board') }}" class="nav-item nav-link" style=" margin-right:20px;font-size: 18px">Board</a></li>
                <li><a href="{{ url('/blog/album') }}" class="nav-item nav-link" style=" margin-right:20px;font-size: 18px">Album</a></li>
                <li><a href="{{ url('/blog/friend') }}" class="nav-item nav-link"style=" margin-right:20px;font-size: 18px">Friends</a></li>
                <li><a href="https://www.instagram.com" class="nav-item nav-link"style=" margin-right:20px;font-size: 18px">Instagram</a></li>
                  <li><a href="https://www.facebook.com" class="nav-item nav-link"style=" margin-right:20px;font-size: 18px">Facebook</a></li>
                
            </ul>
        </div>
        
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
             <img src="{{ url("/assets/icon07.png") }}" alt="first" style="display:inline-block;width:170px; height:70px;margin-right: 40px">

                    <li class="nav-item">
                        <a href="{{ url('/blog/messages') }}"><i class="far fa-comment-dots"  title="message"style="font-size: 25px; margin-right:5px;"></i></a>
                         <a href="{{ url('/blog/news') }}"><i class="far fa-bell" title="alarm"style="font-size: 25px; margin-right:5px;"></i></a>


                        
                        </li> 

                        
                        <li class="nav-item dropdown">

                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>
                            

                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/blog/mypage') }}">
                                    {{ __('마이페이지') }}
                                </a>
                                 <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('로그아웃') }}
                                </a>


                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </div>

    <div class="py-4" style="padding-top: 0rem">
        @yield('content')
    </div>
</div>

    
<script type="text/javascript" src="{{ url("/libs/jquery/dist/jquery.min.js") }}"></script>
<script type="text/javascript" src="{{ url('/libs/jquery-blockui/jquery.blockUI.js') }}"></script>
<script type="text/javascript" src="{{ url('/libs/jquery-dateformat/jquery-dateformat.js') }}"></script>
<script type="text/javascript" src="{{ url('/libs/jquery-ui/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ url("/libs/jquery-confirm/jquery-confirm.min.js") }}"></script>
@include('layouts.util')
<script type="text/javascript">
</script>
@yield('script')
</body>
</html>
