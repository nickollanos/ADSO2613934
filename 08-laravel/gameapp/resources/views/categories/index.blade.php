@extends('layouts.app')
@section('title', 'GameApp - Module-Categories')
@section('class', 'module-categories')

@section('content')
    <header>
        <a href="{{ url('dashboard') }}" class="btn-back">
            <img src="{{ asset('images/btn-back.svg') }}" alt="Back">
        </a>
        <img src="{{ asset('images/title-module-categories.svg') }}" alt="">
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
            <a href="{{ url('categories/create') }}" class="btn-add">
                <img class="img-add" src="{{ asset('images/ico-add.svg') }}" alt="btn-add">
            </a>

            <div class="options">
                <input type="text" placeholder="SEARCH" name="qsearch" id="qsearch">
            </div>

            <div class="loader"></div>
            <div id="list">
                @foreach ($categories as $category)
                    <div class="category">
                        <img class="users" src="{{ asset('images') . '/' . $category->photo }}" alt="Photo">
                        <h1> {{ $category->name }} </h1>
                        <p> {{ $category->manufacturer }} </p>
                        <div class="btn-function">
                            <a href="{{ url('categories/' . $category->id) }}" class="btn-search">
                            </a>
                            <a href="{{ url('categories/' . $category->id . '/edit') }}" class="btn-edit">
                            </a>
                            <a href="javascript:;" class="btn-delete" data-fullname="{{ $category->name }}">
                            </a>
                            <form action="{{ url('categories/' . $category->id) }}" method="POST" style="display: none">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </article>
    </section>
    <footer>
        <div class="footer-mod-user">
            {{-- Renderiza la vista de paginación personalizada --}}
            {{ $categories->links('layouts.paginator') }}

            {{-- Enlace a la página anterior --}}
            <a href="{{ $categories->previousPageUrl() }}" class="arrow-left">
            </a>

            {{-- Muestra el número de página actual y el total de páginas --}}
            <h4>{{ $categories->currentPage() }} DE {{ $categories->lastPage() }}</h4>

            {{-- Enlace a la página siguiente --}}
            <a href="{{ $categories->nextPageUrl() }}" class="arrow-right">
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
                var $name = $this.attr('data-fullname');
                Swal.fire({
                    title: "Estas seguro?",
                    text: "Deseas eliminar a: " + $name,
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, eliminar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $this.next('form').submit()
                    }
                });
            })

            //-------------------------------------------------
            $('body').on('keyup', '#qsearch', function(e) {
                e.preventDefault()
                $query = $(this).val()
                $token = $('input[name=_token]').val()
                $model = 'categories'

                $('.loader').show()
                $('#list').hide()

                setTimeout(() => {
                    $.post($model + '/search', {
                            q: $query,
                            _token: $token
                        },
                        function(data) {
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
