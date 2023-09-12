<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Job portal</title>
    <link href="https://cdn.jsdelivr.xyz/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />

</head>

<body>
<script src="https://cdn.jsdelivr.xyz/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous">
</script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>



{{--<nav class="navbar navbar-expand-lg bg-dark shadow-lg" data-bs-theme="dark">--}}
{{--    <div class="container">--}}
{{--        <a class="navbar-brand" href="#">Navbar</a>--}}
{{--        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"--}}
{{--                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--            <span class="navbar-toggler-icon"></span>--}}
{{--        </button>--}}
{{--        <div class="collapse navbar-collapse" id="navbarNav">--}}
{{--            <ul class="navbar-nav ms-auto">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link active" aria-current="page" href="{{route('home')}}">Home</a>--}}
{{--                </li>--}}
{{--                @if(Auth::check())--}}
{{--                <li class="nav-item dropdown">--}}
{{--                    <a class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                        @if(auth()->user()->profile_pic)--}}
{{--                            <img src="{{Storage::url( auth()->user()->profile_pic)}}" width="40" class="rounded-circle">--}}
{{--                        @else--}}
{{--                            <img src="https://placehold.co/400" class="rounded-circle" width="40">--}}
{{--                        @endif--}}
{{--                    </a>--}}
{{--                    <ul class="dropdown-menu">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a class="nav-link active" aria-current="page" href="{{route('user.profile')}}">Profile</a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            --}}{{-- Try do this with JS --}}
{{--                            <a class="nav-link" id="logout" href="#">Logout</a>--}}
{{--                            <form id="form-logout" action="{{route('logout')}}" method="post">--}}
{{--                                @csrf--}}
{{--                            </form>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}
{{--                @endif--}}
{{--                @if(!auth()->check())--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{route('login')}}">Login</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{route('create.seeker')}}">Job Seeker</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link " href="{{route('create.employee')}}">Employer</a>--}}
{{--                    </li>--}}
{{--                @endif--}}

{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</nav>--}}

{{--@yield('content')--}}

{{--<script>--}}
{{--    let logout = document.getElementById('logout');--}}
{{--    let form = document.getElementById('form-logout');--}}
{{--    logout.addEventListener('click', function () {--}}
{{--        form.submit();--}}
{{--    })--}}
{{--</script>--}}



<script src="https://cdn.jsdelivr.xyz/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous">
</script>
<script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
<style>
    :root {
        --color-primary: #f857a8;
        --color-secondary: #ff5858;
        --color-neutral-lt: #fff;
        --color-neutral-med: #8af7bb;
        --color-neutral-dk: rgb(4, 61, 4);
        --shadow: 0px 3px 10px rgba(0, 0, 0, 0.1);
        --headings-font: "Saira Semi Condensed", sans-serif;
    }


    /* Reset */
    button,
    button:focus,
    input:focus {
        background: none;
        box-shadow: none;
        border: none;
        cursor: pointer;
        outline: 0;
    }

    html {
        scroll-behavior: smooth;
    }

    /* Layout */
    body {
        line-height: 1.5em;
        padding: 0;
        margin: 0;
    }

    section {
        height: 100vh;
    }

    #home {
        background-color: #ddd;
    }

    #about {
        background-color: var(--color-neutral-dk);
    }

    #work {
        background-color: var(--color-neutral-lt);
    }

    #contact {
        background-color: var(--color-neutral-med);
    }

    /* Nav */
    #nav-wrapper {
        overflow: hidden;
        width: 100%;
        margin: 0 auto;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1;
    }

    #nav {
        background-color: var(--color-neutral-lt);
        box-shadow: var(--shadow);
        display: flex;
        flex-direction: column;
        font-family: var(--headings-font);
        height: 4em;
        overflow: hidden;
    }

    #nav.nav-visible {
        height: 100%;
        overflow: auto;
    }

    .nav {
        display: flex;
        height: 4em;
        line-height: 4em;
        flex-grow: 1;
    }

    .nav-link,
    .logo {
        padding: 0 1em;
    }

    span.gradient {
        background: linear-gradient(45deg, #1e7538, #8af7bb);
        padding: 0 1em;
        position: relative;
        right: 1em;
        margin-right: auto;
    }

    h1.logo {
        font-weight: 1.5;
        font-size: 1.75em;
        line-height: 0.75em;
        color: var(--color-neutral-lt);
        transition: width 1s ease-in-out;
        display: inline-block;
    }

    h1.logo:hover {
        width: 200px;
    }

    h1.logo a,
    h1.logo a:visited {
        text-decoration: none;
        color: var(--color-neutral-lt);
    }

    .nav-link {
        text-transform: uppercase;
        text-align: center;
        border-top: 0.5px solid var(--color-neutral-med);
    }

    .nav-link a,
    #nav .nav-link a:visited {
        text-decoration: none;
        color: var(--color-primary);
    }

    .nav-link a:hover {
        text-decoration: underline;
    }

    .right {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .btn-nav {
        color: var(--color-primary);
        padding-left: 2em;
        padding-right: 2em;
    }

    #nav-wrapper {
        overflow: hidden;
    }

    #nav {
        overflow: hidden;
        flex-direction: row;
    }

    .nav-link {
        border-top: none;
    }

    .right {
        overflow: hidden;
        flex-direction: row;
        justify-content: flex-end;
        position: relative;
        left: 0px;
        height: auto;
    }

    .btn-nav {
        display: none;
    }

    .active {
        background: #8af7bb;
        color: #fff;
    }

    .nav-link-span {
        transform: skew(20deg);
        display: inline-block;
    }

    .nav-link {
        transform: skew(-20deg);
        color: #777;
        text-decoration: none;
    }

    a:hover.nav-link:not(.active) {
        color: var(--color-neutral-dk);
        background: var(--color-neutral-med);
        background: linear-gradient(
            45deg,
            var(--color-neutral-lt),
            var(--color-neutral-med)
        );
    }

    .skew {
        transform: skew(-20deg);
    }

    .un-skew {
        transform: skew(20deg);
    }

    .fa-caret-down {
        margin-right: 50px;
    }

    .dropdown {
        position: relative;
    }

    .dropdown a {
        display: flex;
    }

    .dropdown-content {
        line-height: 25px;
        width: 70px;
        display: none;
        position: fixed;
        left: auto+ -40px;
        background-color: #fff;
        color: white;
        padding: 10px;
        font-weight: 600;
    }

    .dropdown-content p a:hover {
        color: #023b16;
    }
    .dropdown-content p a{
        text-decoration: none;
        color: #068139;

    }
    .dropdown:hover .dropdown-content {
        display: block;
    }

    @keyframes logo-hover {
        20% {
            padding-right: 0em;
        }
        100% {
            padding-right: 5em;
        }
    }

    i {
        margin-right: 10px;
    }
</style>
<header id="nav-wrapper">
    <nav id="nav">
        <div class="nav left">
          <span class="gradient skew">
              <h1 class="logo un-skew"><a href="{{route('home')}}">Wuzzufny</a></h1>
          </span>
            <button id="menu" class="btn-nav">
                <span class="fas fa-bars"></span>
            </button>
        </div>

        <div class="nav right">
            <a href="{{route('home')}}" class="nav-link home">
                <span class="nav-link-span">
                    <span class="u-nav">Home</span>
                </span>
            </a>


            @if(Auth::check())
                @if(auth()->user()->user_type == 'employer')
                    <a href="{{route('dashboard')}}" class="nav-link home">
                <span class="nav-link-span">
                    <span class="u-nav">dashboard</span>
                </span>
                    </a>
                @endif
                <div class="dropdown">
                    <a href="#work" class="nav-link"
                    ><span class="u-nav"
                        ><i class="fa-solid fa-caret-down fa-2x"></i></span>
                    </a>

                    <div class="dropdown-content">
                        <p><a href="{{route('user.profile')}}">Profile</a></p>
                        <p><a  id="logout" href="#">Logout</a></p>
                        <form id="form-logout" action="{{route('logout')}}" method="post">
                            @csrf
                        </form>
                    </div>
                </div>
            @endif
            @if(!auth()->check())

                <a href="{{route('login')}}" class="nav-link login">
                    <span class="nav-link-span">
                        <span class="u-nav">Login</span>
                    </span>
                </a>
                <a href="{{route('register')}}" class="nav-link register">
                    <span class="nav-link-span">
                        <span class="u-nav">Register</span>
                    </span>
                </a>
            @endif
        </div>
    </nav>
</header>

@yield('content')
<script>
    let logout = document.getElementById('logout');
    let form = document.getElementById('form-logout');
    logout.addEventListener('click', function () {
        form.submit();
    })
</script>

</body>

</html>
