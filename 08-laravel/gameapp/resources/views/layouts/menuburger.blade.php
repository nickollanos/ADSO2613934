@auth
<nav class="nav">
    <!--<img src="images/ico-menu.svg" alt="Menu" class="title-menu">-->
    <menu>
        <div class="form-group">
            <img class="mask" src="{{ asset('images') . '/' . Auth::user()->photo }}" height="160px" alt="Photo">
            <img class="border" src="{{ asset('images/shape-border-photo.svg') }}" alt="Border">
        </div>
        <h1 class="nombre-user">{{ Auth::user()->fullname }}</h1>
        <div class="ico-admin">
           <h1> {{ Auth::user()->role }} </h1>
        </div>
        <a href="{{ url('myprofile') }}">
            <img src="{{ asset('images/ico-myprofile.svg') }}" alt="Myprofile">
        </a>
        <a href="{{ url('dashboard') }}">
            <img src="{{ asset('images/ico-dashboard.svg') }}" alt="Dashboard">
        </a>
        <a href="javascript:;" onclick="logout.submit();">
            <img src="{{ asset('images/ico-logout.svg') }}" alt="Logout">
        </a>
        <form id="logout" action="{{ route('logout') }}" method="POST">
            @csrf
        </form>
    </menu>
</nav>
@endauth

@guest
<nav class="nav">
    <img src="{{ asset('images/ico-menu.svg') }}" alt="Menu" class="title-menu">
    <menu>
        <a href="{{url('login')}}">
            <img src="{{ asset('images/ico-login.svg') }}" alt="Login">
        </a>
        <a href="{{url('register')}}">
            <img src="{{ asset('images/ico-register.svg') }}" alt="Register">
        </a>
        <a href="{{url('catalogue')}}">
            <img src="{{ asset('images/ico-catalogue.svg') }}" alt="Catalogue">
        </a>
    </menu>
</nav>
@endguest
