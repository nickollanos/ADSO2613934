@extends('layouts.app')
@section('title', 'GameApp - Catalogue')
@section('class', 'catalogue')

@section('content')
<header>
    <a href="{{url('/')}}" class="btn-back">
        <img src="images/btn-back.svg" alt="Back">
    </a>
    <img src="images/logo-welcome.svg" alt="Logo" class="logo-top">
    <svg class="btn-burger" viewBox="0 0 100 100" width="80">
        <path class="line top"
            d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom"
            d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
    </svg>
</header>
@include('layouts.menuburger')
<section class="scroll">
    <form action="" method="POST">
        <input type="text" placeholder="FILTER" maxlength="18">
    </form>
    <article>
        <h2>
            <img src="images/ico-category.svg" alt="Category">
            XBOX:
        </h2>
        <div class="owl-carousel owl-theme">
            <figure>
                <img class="slide" src="images/slide-c1-01.png" alt="" class="slide">
                HALO
                <a href="view.html" class="btn-more">
                    <img class="view" src="images/ico-more.svg" class="view" alt="">
                    VIEW
                </a>
            </figure>
            <figure>
                <img class="slide" src="images/slide-c1-02.png" alt="" class="slide">
                GEAR OF WAR
                <a href="view.html" class="btn-more">
                    <img class="view" src="images/ico-more.svg" alt="">
                    VIEW
                </a>
            </figure>
            <figure>
                <img class="slide" src="images/slide-c1-03.png" alt="" class="slide">
                HOGWARTS
                <a href="view.html" class="btn-more">
                    <img class="view" src="images/ico-more.svg" alt="">
                    VIEW
                </a>
            </figure>
        </div>
    </article>
    <article>
        <h2>
            <img src="images/ico-category.svg" alt="Category">
            PS:
        </h2>
        <div class="owl-carousel owl-theme">
            <figure>
                <img class="slide" src="images/slide-c2-01.png" alt="" class="slide">
                NEED FOR SPEED
                <a href="view.html" class="btn-more">
                    <img class="view" src="images/ico-more.svg" class="view" alt="">
                    VIEW
                </a>
            </figure>
            <figure>
                <img class="slide" src="images/slide-c2-02.png" alt="" class="slide">
                EFOOTBALL
                <a href="view.html" class="btn-more">
                    <img class="view" src="images/ico-more.svg" alt="">
                    VIEW
                </a>
            </figure>
            <figure>
                <img class="slide" src="images/slide-c2-03.png" alt="" class="slide">
                GOD OF WAR
                <a href="view.html" class="btn-more">
                    <img class="view" src="images/ico-more.svg" alt="">
                    VIEW
                </a>
            </figure>
        </div>
    </article>
    <article>
        <h2>
            <img src="images/ico-category.svg" alt="Category">
            MOBILE:
        </h2>
        <div class="owl-carousel owl-theme">
            <figure>
                <img class="slide" src="images/slide-c3-01.png" alt="" class="slide">
                DLS24
                <a href="view.html" class="btn-more">
                    <img class="view" src="images/ico-more.svg" class="view" alt="">
                    VIEW
                </a>
            </figure>
            <figure>
                <img class="slide" src="images/slide-c3-02.png" alt="" class="slide">
                CLASH OF CLANS
                <a href="view.html" class="btn-more">
                    <img class="view" src="images/ico-more.svg" alt="">
                    VIEW
                </a>
            </figure>
            <figure>
                <img class="slide" src="images/slide-c3-03.png" alt="" class="slide">
                CALL OF DUTTY
                <a href="view.html" class="btn-more">
                    <img class="view" src="images/ico-more.svg" alt="">
                    VIEW
                </a>
            </figure>
        </div>
    </article>
</section>
@endsection

@section('js')
    <script>
         $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                center: false,
                loop: true,
                margin: 10,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 2
                    }
                }
            })
            //-------------------------------------------------
            $('header').on('click','.btn-burger', function(){
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            })
            //-------------------------------------------------
        });
    </script>
@endsection