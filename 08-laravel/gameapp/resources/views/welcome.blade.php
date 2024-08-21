@extends('layouts.app')
@section('title', 'GameApp - Welcome')
@section('class', 'welcome')

@section('content')
<header>
    <img src="{{ asset('images/logo-welcome.svg') }}" alt="Logo">
</header>
<section class="owl-carousel owl-theme">
    <img src="{{ asset('images/slide01.png') }}" alt="slide01">
    <img src="{{ asset('images/slide02.png') }}" alt="slide02">
    <img src="{{ asset('images/slide03.png') }}" alt="slide03">
</section>
<footer>
    <a href="{{ url('catalogue') }}" class="btn btn-explore">
        <img id="myImage" src="{{ asset('images/content-btn-welcome.svg') }}" alt="Explore">
    </a>
</footer>
@endsection

@section('js')
<script>
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            responsive:{
                0:{
                    items:1
                }
            }
        })
    })
</script>
@endsection