@extends('layouts.app')
@section('title', 'GameApp - Show-Users')
@section('class', 'show-users')

@section('content')
<header>
    <a href="{{ url('users') }}" class="btn-back">
        <img src="{{ asset('images/btn-back.svg') }}" alt="Back">
    </a>
    <img src="{{ asset('images/title-show.svg') }}" alt="Logo" class="logo-top">
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
            <img id="upload" class="mask" src="{{ asset('images') . '/' . $user->photo }}" alt="Photo">
            {{-- <img class="border" src="{{ asset('images/shape-border-photo.svg') }}" alt="Border"> --}}
        </div>
        <div class="nombre-email">
            <p>
                {{ $user->fullname }}
            </p>
            <h4>
                {{ $user->email }}
            </h4>
        </div>
        <div class="ico-admin-profile">
            <img src="{{ asset('images/ico-profile.svg') }}" alt="Login">
            <h1 color=black> {{ Auth::user()->role }} </h1>
            {{-- <img src="images/ico-admin-profile.svg" alt="Login"> --}}
        </div>
        <div class="datos">
            <div class="cedula">
                <img src="{{ asset('images/ico-profile.svg') }}" alt="Login">
                <h1>
                    {{ $user->document }}
                </h1>
            </div>
            <div class="telefono">
                <img src="{{ asset('images/ico-profile.svg') }}" alt="Login">
                <h1>
                    {{ $user->phone }}
                </h1>
            </div>
            <div class="estado">
                <img src="{{ asset('images/ico-profile.svg') }}" alt="Login">
                <h1>
                    ACTIVE
                </h1>
            </div>
            <div class="sexo">
                <img src="{{ asset('images/ico-profile.svg') }}" alt="Login">
                <h1>
                    {{ $user->gender }}
                </h1>
            </div>
            <div class="fecha-nac">
                <img src="{{ asset('images/ico-profile.svg') }}" alt="Login">
                <h1>
                    {{ $user->birthdate }}
                </h1>
            </div>
            <div class="direccion">
                <img src="{{ asset('images/ico-profile.svg') }}" alt="Login">
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

            !$togglePass ? $(this).attr('src', '{{ asset('images/ico-eye-close.svg') }}')
                         : $(this).attr('src', '{{ asset('images/ico-eye.svg') }}')
            
            $togglePass = !$togglePass     
        });
        //--------------------------------------------
    </script>
@endsection