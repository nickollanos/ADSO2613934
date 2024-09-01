@extends('layouts.app')
@section('title', 'GameApp - Show-Categories')
@section('class', 'show-categories')

@section('content')
<header>
    <a href="{{ url('categories') }}" class="btn-back">
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
            <img id="upload" class="mask" src="{{ asset('images') . '/' . $category->image }}" height="160px" alt="Photo">
            {{-- <img class="border" src="images/shape-border-photo.svg" alt="Border"> --}}
        </div>
        <div class="nombre-email">
            <p>
                {{ $category->name }}
            </p>
        </div>
        <div class="datos">
            <div class="cedula">
                <img src="{{ asset('images/ico-tipo.svg') }}" alt="Tipo">
                <h1>
                    {{ $category->manufacturer }}
                </h1>
            </div>
            <div class="estado">
                <img src="{{ asset('images/ico-date.svg') }}" alt="Date">
                <h1>
                    {{ $category->releasedate }}
                </h1>
            </div>
        </div>
        <div class="description-1">
            <img class="desc" src="{{ asset('images/ico-description.svg') }}" alt="Desc">
            <h4>{{ $category->description }}</h4>
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