@extends('layouts.app')
@section('title', 'GameApp - Edit-Users')
@section('class', 'edit-users')

@section('content')
<header>
    <a href="{{ url('games') }}" class="btn-back-add-users">
        <img src="{{ asset('images/btn-back.svg') }}" alt="Back">
    </a>
    <img class="img-add" src="{{ asset('images/title-add.svg') }}" alt="">
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
    <form action="{{ url('games/' . $game->id ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
            @if ( count( $errors->all()) > 0 )
                @foreach ( $errors->all() as $message )  
                    <li> {{ $message }} </li>
                @endforeach
            @endif
        
        <div class="form-group">
            <img id="upload" class="mask" src="{{ asset('images/') .  $game->image }}"  height="160px" alt="Photo">
            <img class="border" src="{{ asset('images/shape-border-photo.svg') }}" alt="Border">
            <input id="photo" type="file" name="photo" accept="images/*">
            <input type="hidden" name="originphoto" value="{{ $game->image }}">
            <input type="hidden" name="id" value="{{ $game->id }}">
        </div>

        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-game.svg') }}" alt="title">
                NAME GAME:
            </label>
            <input type="text" name="title" value="{{ old('title', $game->title) }}" placeholder="EFOOTBALL 2024">
        </div>

        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-categoria.svg') }}" alt="Category">
                CATEGORY:
            </label>
            <select name="category_id">
                <option value="">SELECT</option>
                @foreach($cats as $cat)
                    <option value="{{ $cat->id }}" @if(old('category_id') == $cat->id ) selected @endif>{{ $cat->name }}</option>
                @endforeach
            </select>
            {{-- <input type="text" name="Category" placeholder="Play Station 5"> --}}
        </div>

        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-categoria.svg') }}" alt="Category">
                SLIDER:
            </label>
            <select name="slider">
                <option value="">SELECT</option>
                <option value="1" @if(old('slider') == 1) selected @endif>ACTIVE</option>
                <option value="0" @if(old('slider') == 0) selected @endif>INACTIVE</option>
            </select>
            {{-- <input type="text" name="Category" placeholder="Play Station 5"> --}}
        </div>

        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-game.svg') }}" alt="developer">
                DEVELOPER:
            </label>
            <input type="text" name="developer" value"{{ old('developer', $game->developer) }}"  >
        </div>

        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-date.svg') }}" alt="releasedate">
                YEAR:
            </label>
            <input type="text" name="releasedate" value"{{ old('releasedate', $game->developer) }}" placeholder="2024">
        </div>

        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-game.svg') }}" alt="genre">
                GENRE:
            </label>
            <input type="text" name="genre" value"{{ old('genre', $game->genre) }}" placeholder="EFOOTBALL 2024">
        </div>

        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-price.svg') }}" alt="price">
                PRICE:
            </label>
            <input type="number" name="price" value"{{ old('price', $game->price) }}" placeholder="$59">
        </div>

        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-description.svg') }}" alt="description">
                DESCRIPTION:
            </label>
            <textarea name="description" placeholder="Es un videojuego de simulacion de futbol..." >{{ old('description', $game->description) }}</textarea>                
        </div>

        <div class="form-group">
            <button type="submit">
                <img src="{{ asset('images/content-btn-edit.svg') }}" alt="Edit">
            </button>
        </div>
    </form>
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
    //-------------------------------------------------
        //este sirve para escoger la imagen desde la parte local en el registro
    //-------------------------------------------------
    $('.border').click(function (e) {
        $('#photo').click()
    });

    $('#photo').change(function (e) {
        e.preventDefault()
        let reader = new FileReader()
        reader.onload = function(evt) {
            $('#upload').attr('src', event.target.result)
        }
        reader.readAsDataURL(this.files[0])
    })
    //--------------------------------------------
    @if ($errors->any())
    @php $error = '' @endphp
    @foreach ($errors->all() as $message)
        @php $error .= '<li>' . $message . '</li>' @endphp
    @endforeach


    $(document).ready(function(){
        Swal.fire({
            position: 'top',
            title: 'Ops !',
            html: '<ul>{!! $error !!}</ul>',
            icon: 'error',
            toast: true,
            showConfirmButton: false,
            timer: 5000
        })
    })
    @endif
</script>
@endsection