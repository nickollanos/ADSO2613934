@extends('layouts.app')
@section('title', 'GameApp - My-Profile')
@section('class', 'myprofile')

@section('content')
<header>
    <a href="{{ url('/') }}" class="btn-back">
        <img src="images/btn-back.svg" alt="Back">
    </a>
    <img src="images/title-dashboard.svg" alt="Logo" class="logo-top">
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top"
            d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>
@include('layouts.menuburger')
<section>
    <div class="myprofile">
        <div class="img">
            <img id="upload" class="mask" src="{{ asset('images') . '/' . Auth::user()->photo }}" height="160px" alt="Photo">
            {{-- <img class="border" src="images/shape-border-photo.svg" alt="Border"> --}}
        </div>
        <div class="nombre-email">
            <p>
                {{ Auth::user()->fullname }}
            </p>
            <h4>
                {{ Auth::user()->email }}
            </h4>
        </div>
        <div class="ico-admin-profile">
            <img src="images/ico-profile.svg" alt="Login">
            <h1 color=black> {{ Auth::user()->role }} </h1>
            {{-- <img src="images/ico-admin-profile.svg" alt="Login"> --}}
        </div>
        <div class="datos">
            <div class="cedula">
                <img src="images/ico-profile.svg" alt="Login">
                <h1>
                    {{ Auth::user()->document }}
                </h1>
            </div>
            <div class="telefono">
                <img src="images/ico-profile.svg" alt="Login">
                <h1>
                    {{ Auth::user()->phone }}
                </h1>
            </div>
            <div class="estado">
                <img src="images/ico-profile.svg" alt="Login">
                <h1>
                    ACTIVE
                </h1>
            </div>
            <div class="sexo">
                <img src="images/ico-profile.svg" alt="Login">
                <h1>
                    {{ Auth::user()->gender }}
                </h1>
            </div>
            <div class="fecha-nac">
                <img src="images/ico-profile.svg" alt="Login">
                <h1>
                    {{ Auth::user()->birthdate }}
                </h1>
            </div>
            <div class="direccion">
                <img src="images/ico-profile.svg" alt="Login">
                <h1>
                    STR 23-45
                </h1>
            </div>
        </div>
    </div>
</section>
@endsection

@section('js')
    <script>
  
        //-------------------------------------------------
        $('header').on('click','.btn-burger', function(){
            $(this).toggleClass('active')
            $('.nav').toggleClass('active')
        });
        //-------------------------------------------------
            //este sirve para el ojito de la contraseña
        //-------------------------------------------------
        $togglePass = false
        $('section').on('click','.ico-eye', function(){

            !$togglePass ? $(this).next().attr('type', 'text')
                         : $(this).next().attr('type', 'password')

            !$togglePass ? $(this).attr('src', 'images/ico-eye-close.svg')
                         : $(this).attr('src', 'images/ico-eye.svg')
            
            $togglePass = !$togglePass     
        });
        //--------------------------------------------
    </script>
@endsection