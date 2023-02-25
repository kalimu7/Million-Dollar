<!DOCTYPE html>
<html>
<head>
    <title>Million Dollar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

</head>
<body>
    
        <nav class="navbar navbar-expand-lg bg-body-tertiary bg-dark px-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Social Network</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav  mb-2 mb-lg-0  ms-auto">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        {{-- ************links**************** --}}
                        @if (!Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="/register">Signup</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Login</a>
                            </li> 
                        @endif
                        @if (Auth::check())
                            <li class="nav-item">
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button class="nav-link" type="submit">Logout</button>
                                </form>
                            </li> 
                        @endif
                        {{-- ************links**************** --}}

                    </ul>
                </div>
            </div>
        </nav>
    
<div class="middle">

    @yield('content')

</div>
   @include('footer')
   <script src="/JS/logic.js"></script>
</body>
</html>