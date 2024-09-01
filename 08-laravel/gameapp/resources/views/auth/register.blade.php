@extends('layouts.app')
@section('title', 'GameApp - Register')
@section('class', 'register')

@section('content')
<header>
    <a href="{{url('/')}}" class="btn-back">
        <img src="{{ asset('images/btn-back.svg') }}" alt="Back">
    </a>
    <img src="{{ asset('images/title-register.svg') }}" alt="">
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
    <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
        @csrf
            {{-- @if ( count( $errors->all()) > 0 )
            @foreach ( $errors->all() as $message )  
                <li> {{ $message }} </li>
            @endforeach
        @endif        --}}
        <div class="form-group">
            <img id="upload" class="mask" src="{{ asset('images/bg-upload-photo.svg') }}"  height="160px" alt="Photo">
            <img class="border" src="{{ asset('images/shape-border-photo.svg') }}" alt="Border">
            <input id="photo" type="file" name="photo" accept="{{ asset('images/*') }}">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-user.svg') }}" alt="document" >
                DOCUMENT:
            </label>
            <input type="text" name="document" placeholder="1053838444" value="{{ old('document') }}">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-user.svg') }}" alt="fullname">
                FULLNAME:
            </label>
            <input type="text" name="fullname" placeholder="JAIME DE LA PAVA"  value="{{ old('fullname') }}">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-user.svg') }}" alt="gender">
                GENDER:
            </label>
            <select name="gender">
                <option value="" disabled {{ old('gender') == '' ? 'selected' : '' }}>Select Gender</option>
                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
            </select>
            {{-- <input type="text" name="gender" placeholder="MASCULINO"  value="{{ old('gender') }}"> --}}
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
            <input type="text" name="birthdate" placeholder="1920-03-02">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-phone.svg') }}" alt="Phone" {{ old('phone') }}>
                PHONE NUMBER:
            </label>
            <input type="text" name="phone" placeholder="3452345">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-email.svg') }}" alt="Email" {{ old('email') }}>
                EMAIL:
            </label>
            <input type="text" name="email" placeholder="gru@gmail.com">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-pass.svg') }}" alt="Password">
                PASSWORD:
            </label>
            <img class="ico-eye" src="{{ asset('images/ico-eye.svg') }}" alt="Eye">
            <input type="password" name="password" placeholder="dontmesswithmydog">
        </div>
        <div class="form-group">
            <label>
                <img src="{{ asset('images/ico-pass.svg') }}" alt="Confirm Password">
                CONFIRM PASSWORD:
            </label>
            <img class="ico-eye" src="{{ asset('images/ico-eye.svg') }}" alt="Eye">
            <input type="password" name="password_confirmation" placeholder="dontmesswithmydog" required>
        </div>
        <div class="form-group">
            <button type="submit">
                <img src="{{ asset('images/content-btn-register.svg') }}" alt="Register">
            </button>
        </div>
    </form>
</section>
@endsection

{{-- @if (count($errors->all()) > 0)
    @php $error = '' @endphp
    @foreach ($errors->all() as $message)
            @php $error .= '<li>' . $message . '</li>' @endphp
    @endforeach
@endif --}}

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

            $(document).ready(function(){
                Swal.fire({
                    position: "top",
                    title: "Ops !",
                    html: `{!! implode('<br>', $errors->all()) !!}`,
                    icon: "error",
                    toast: true,
                    showConfirmButton: false,
                    timer: 5000
                })
            }); 
            // $('figure').on('click', '.btn-delete', function() {
            //     $fullname = $(this).attr('data-fullname')
            //     Swal.fire({
            //         title: "Are you sure?",
            //         text: "Esta seguro que desea eliminar a:" + $fullname,
            //         icon: "warning",
            //         showCancelButton: true,
            //         confirmButtonColor: "#3085d6",
            //         cancelButtonColor: "#d33",
            //         confirmButtonText: "Yes, delete it!"
            //     }).then((result) => {
            //         if (result.isConfirmed) {
            //             $(this).next().submit()
            //         }
            //     });
            // })
    </script>
@endsection