@extends('layouts.app')
@section('title', 'GameApp - Module-User')
@section('class', 'module-user')

@section('content')
    <header>
        <a href="dashboard-admin.html" class="btn-back">
            <img src="images/btn-back.svg" alt="Back">
        </a>
        <img src="images/title-module-users.svg" alt="">
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('layouts.menuburger')
    <section class="scroll">
        <article>
            <a href="add-users.html" class="btn-add">
                <img class="img-add" src="images/ico-add.svg" alt="btn-add">
            </a>
            @foreach ($users as $user)
            <div class="user">
                <img class="users" src="images/user-c1-01.png" alt="">
                <h1> {{ $user->user->fullname }} </h1>
                <p> {{ $user->user->role }} </p>
                <div class="btn-function">
                    <a href="show-users.html" class="btn-search">
                    </a>
                    <a href="edit-users.html" class="btn-edit">
                    </a>
                    <a href="delete-users.html" class="btn-delete">
                    </a>
                </div>
            </div>
            @endforeach
        </article>
    </section>
    {{-- @include('layouts.paginator') --}}
    <footer>
        <div class="footer-mod-user">
            <a href="view.html" class="arrow-left">
            </a>
            <h4>01 DE 04</h4>
            <a href="view.html" class="arrow-right">
            </a>
        </div>
    </footer>
@endsection

@section('js')
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script>
        //-------------------------------------------------
        $('header').on('click', '.btn-burger', function() {
            $(this).toggleClass('active')
            $('.nav').toggleClass('active')
        });
        //-------------------------------------------------
        //este sirve para el ojito de la contraseña
        //-------------------------------------------------
        $togglePass = false
        $('section').on('click', '.ico-eye', function() {

            !$togglePass ? $(this).next().attr('type', 'text') :
                $(this).next().attr('type', 'password')

                !$togglePass ? $(this).attr('src', 'images/ico-eye-close.svg') :
                $(this).attr('src', 'images/ico-eye.svg')

            $togglePass = !$togglePass
        });
        //--------------------------------------------
    </script>
@endsection
