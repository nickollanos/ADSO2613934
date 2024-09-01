@extends('layouts.app')
@section('title', 'GameApp - Module-User')
@section('class', 'module-user')

@section('content')
    <header>
        <a href="{{ url('dashboard') }}" class="btn-back">
            <img src="{{ asset('images/btn-back.svg') }}" alt="Back">
        </a>
        <img src="{{ asset('images/title-module-users.svg') }}" alt="">
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
            <a href="{{ url('users/create') }}" class="btn-add">
                <img class="img-add" src="{{ asset('images/ico-add.svg') }}" alt="btn-add">
            </a>


            <div class="options">
                <a class="pdf" href="{{ url('export/users/pdf') }}">
                    <img src="{{ asset('images/btn-export-pdf.svg') }}" alt="Pdf">
                </a>
                <input type="text" placeholder="SEARCH" name="qsearch" id="qsearch">
                <a class="excel" href="{{ url('export/users/excel') }}">
                    <img src="{{ asset('images/btn-export-excel.svg') }}" alt="Excel">
                </a>
            </div>

            
            <div class="loader"></div>
            <div id="list">
            @foreach ($users as $user)
                <div class="user">
                    <img class="users" src="{{ asset('images') . '/' . $user->photo }}" alt="Photo">
                    {{-- <img class="border" src="{{ asset('images/shape-border-photo.svg') }}" alt="Border"> --}}
                    <h1> {{ $user->fullname }} </h1>
                    <p> {{ $user->role }} </p>
                    <div class="btn-function">
                        <a href="{{ url('users/' . $user->id) }}" class="btn-search">
                        </a>
                        <a href="{{ url('users/' . $user->id . '/edit') }}" class="btn-edit">
                        </a>
                        <a href="javascript:;" class="btn-delete" data-fullname="{{ $user->fullname }}">
                        </a>
                        <form action="{{ url('users/' . $user->id) }}" method="POST" style="display: none">
                            @csrf
                            @method('delete')
                        </form>
                    </div>
                </div>
            @endforeach
            </div>
        </article>
    </section>

   {{--  <footer>
        <div class="footer-mod-user">
            {{ $users->links() }} 
            {{ $users->links('layouts.paginator') }}
            <a href="view.html" class="arrow-left">
            </a>
            <h4>01 DE 04</h4>
            <a href="view.html" class="arrow-right">
            </a>
        </div>
    </footer> --}}

    <footer>
        <div class="footer-mod-user">
            {{-- Renderiza la vista de paginación personalizada --}}
            {{ $users->links('layouts.paginator') }}
    
            {{-- Enlace a la página anterior --}}
            <a href="{{ $users->previousPageUrl() }}" class="arrow-left">
            </a>
    
            {{-- Muestra el número de página actual y el total de páginas --}}
            <h4>{{ $users->currentPage() }} DE {{ $users->lastPage() }}</h4>
    
            {{-- Enlace a la página siguiente --}}
            <a href="{{ $users->nextPageUrl() }}" class="arrow-right">
            </a>
        </div>
    </footer>
    

@endsection

@section('js')
    <script>
         $(document).ready(function() {
            $('.loader').hide()
            //-------------------------------------------------
            $('header').on('click', '.btn-burger', function() {
                $(this).toggleClass('active')
                $('.nav').toggleClass('active')
            });
            //---------------------------------------
            @if (session('message'))
                Swal.fire({
                    position: "top",
                    title: '{{ session('message') }}',
                    icon: "success",
                    toast: true,
                    timer: 5000
                })
            @endif

            //-------------------------------------------------
            
            //--------------------------------------------
            $('.btn-delete').on('click', function() {
                var $this = $(this);
                var $fullname = $this.attr('data-fullname');
                Swal.fire({
                    title: "Estas seguro?",
                    text: "Deseas eliminar a: " + $fullname,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar",
                    cancelButtonText:"Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $this.next('form').submit()
                    }
                });
            })

            //-------------------------------------------------
            $('body').on('keyup', '#qsearch', function (e){
                e.preventDefault()
                $query = $(this).val()
                $token = $('input[name=_token]').val()
                $model = 'users'

                $('.loader').show()
                $('#list').hide()

                setTimeout(() => {
                    $.post($model + '/search',
                    { q: $query,  _token: $token },
                    function (data){
                        $('#list').html(data)
                        $('.loader').hide()
                        $('#list').fadeIn('slow')
                    }
                )
                }, 1000);
                
            //--------------------------------------------
        })
        });
    </script>
@endsection
