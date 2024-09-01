@extends('layouts.app')
@section('title', 'GameApp - Edit-Categories')
@section('class', 'edit-categories')

@section('content')
    <header>
        <a href="{{ url('categories') }}" class="btn-back-add-users">
            <img src="{{ asset('images/btn-back.svg') }}" alt="Back">
        </a>
        <img class="img-add" src="{{ asset('images/title-edit.svg') }}" alt="">
        <svg class="btn-burger" viewBox="0 0 100 100" width="80">
            <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
            <path class="line middle" d="m 70,50 h -40" />
            <path class="line bottom"
                d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
        </svg>
    </header>
    @include('layouts.menuburger')
    <section class="scroll">
        <form action="{{ url('categories/' . $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            @if (count($errors->all()) > 0)
                @foreach ($errors->all() as $message)
                    <li> {{ $message }} </li>
                @endforeach
            @endif

            <div class="form-group">
                <img id="upload" class="mask-games" src="{{ asset('images/') . $category->image }}" height="160px"
                    alt="Photo">
                <img class="border" src="{{ asset('images/shape-border-photo.svg') }}" alt="Border">
                <input id="photo" type="file" name="photo" accept="images/*">
                <input type="hidden" name="originphoto" value="{{ $category->image }}">
                <input type="hidden" name="id" value="{{ $category->id }}">
            </div>
            <div class="form-group-edit">
                <label>
                    <img src="{{ asset('images/ico-game.svg') }}" alt="Name">
                    CATEGORY NAME:
                </label>
                <input type="text" name="name" value="{{ old('name', $category->name) }}">
            </div>
            <div class="form-group-edit">
                <label>
                    <img src="{{ asset('images/ico-tipo.svg') }}" alt="Manufacturer">
                    MANUFACTURER:
                </label>
                <input type="text" name="manufacturer" value="{{ old('manufacturer', $category->manufacturer) }}">
            </div>
            <div class="form-group-edit">
                <label>
                    <img src="{{ asset('images/ico-date.svg') }}" alt="Releasedate">
                    REALESE DATE:
                </label>
                <input type="text" name="releasedate" value="{{ old('releasedate', $category->releasedate) }}">
            </div>
            <div class="form-group-description">
                <label>
                    <img src="{{ asset('images/ico-description.svg') }}" alt="Description">
                    DESCRIPTION:
                </label>
                <textarea name="description">{{ old('description', $category->description) }}</textarea>
            </div>
            <div class="form-group-edit">
                <button type="submit">
                    <img src="{{ asset('images/content-btn-edit.svg') }}" alt="Add">
                </button>
            </div>
        </form>
    </section>
@endsection

@section('js')
    <script>
        //-------------------------------------------------
        $('header').on('click', '.btn-burger', function() {
            $(this).toggleClass('active')
            $('.nav').toggleClass('active')
        });
        //-------------------------------------------------
        //-------------------------------------------------
        //este sirve para escoger la imagen desde la parte local en el registro
        //-------------------------------------------------
        $('.border').click(function(e) {
            $('#photo').click()
        });

        $('#photo').change(function(e) {
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


            $(document).ready(function() {
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
