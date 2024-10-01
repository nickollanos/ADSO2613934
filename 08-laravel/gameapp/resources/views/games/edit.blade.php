@extends('layouts.app')
@section('title', 'GameApp - Edit-Users')
@section('class', 'edit-users')

@section('content')
<header>
    <a href="{{ url('users') }}" class="btn-back-add-users">
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
    <form action="{{ url('users/' . $user->id ) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
            @if ( count( $errors->all()) > 0 )
                @foreach ( $errors->all() as $message )  
                    <li> {{ $message }} </li>
                @endforeach
            @endif
        
        <div class="form-group">
            <img id="upload" class="mask" src="{{ asset('images/') .  $user->photo }}"  height="160px" alt="Photo">
            <img class="border" src="{{ asset('images/shape-border-photo.svg') }}" alt="Border">
            <input id="photo" type="file" name="photo" accept="images/*">
            <input type="hidden" name="originphoto" value="{{ $user->photo }}">
            <input type="hidden" name="id" value="{{ $user->id }}">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-user.svg') }}" alt="document" >
                DOCUMENT:
            </label>
            <input type="text" name="document" placeholder="1053838444" value="{{ old('document', $user->document) }}">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-user.svg') }}" alt="fullname">
                FULLNAME:
            </label>
            <input type="text" name="fullname" placeholder="JAIME DE LA PAVA"  value="{{ old('fullname', $user->fullname) }}">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-user.svg') }}" alt="gender">
                GENDER:
            </label>
            <input type="text" name="gender" placeholder="MASCULINO"  value="{{ old('gender', $user->gender) }}">
            {{-- <select name="gender">
                <option name="gender" value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                <option name="gender" value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                <option name="gender" value="other" {{ old('gender') == 'other' ? 'selected' : '' }}>Other</option>
            </select> --}}
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-date.svg') }}" alt="Date">
                BIRTH DATE:
            </label>
            <input type="text" name="birthdate" placeholder="1920-03-02" value="{{ old('birthdate', $user->birthdate) }}">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-phone.svg') }}" alt="Phone" {{ old('phone') }}>
                PHONE NUMBER:
            </label>
            <input type="text" name="phone" placeholder="3452345" value="{{ old('phone', $user->phone) }}">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-email.svg') }}" alt="Email" {{ old('email') }}>
                EMAIL:
            </label>
            <input type="text" name="email" placeholder="gru@gmail.com" value="{{ old('email', $user->email) }}">
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