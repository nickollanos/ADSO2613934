@extends('layouts.app')
@section('title', 'GameApp - Dashboard-Admin')
@section('class', 'dashboard-admin')

@section('content')
<header>
    <a href="{{ url('/') }}" class="btn-back">
        <img src="{{ asset('images/btn-back.svg') }}" alt="Back">
    </a>
    <img src="{{ asset('images/title-dashboard.svg') }}" alt="Logo" class="logo-top">
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
    <div class="user">
        <div class="img">
            <img src="{{ asset('images/ico-users-dash.svg') }}" alt="">
        </div>
        <div class="title-module">
            <p>
                MODULE:
            </p>
            <h4>
                USERS
            </h4>
        </div>
        <div class="row">
            <h4>
                {{ App\Models\User::count() }}
                USERS
            </h4>
        </div>
        <div class="btn-view">
            <a  href="{{ url('users') }}" class="btn-more">
                VIEW
            </a>
        </div>
    </div>
    <div class="categories">
        <div class="img">
            <img src="{{ asset('images/ico-categories-dash.svg') }}" alt="">
        </div>
        <div class="title-module-category">
            <p>
                MODULE:
            </p>
            <h4>
                CATEGORIES
            </h4>
        </div>
        <div class="row">
            <h4>
                {{ App\Models\Category::count() }} CATEGORIES
            </h4>
        </div>
        <div class="btn-view">
            <a href="{{ url('categories') }}" class="btn-more">
                VIEW
            </a>
        </div>
    </div>
    <div class="games">
        <div class="img">
            <img src="{{ asset('images/ico-games-dash.svg') }}" alt="">
        </div>
        <div class="title-module-games">
            <p>
                MODULE:
            </p>
            <h4>
                GAMES
            </h4>
        </div>
        <div class="row">
            <h4>
                {{ App\Models\Game::count() }} GAMES
            </h4>
        </div>
        <div class="btn-view">
            <a href="{{ url('games') }}" class="btn-more">
                VIEW
            </a>
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