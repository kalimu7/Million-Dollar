@extends('layout.app')
@section('content')


<div class="first-content d-flex  align-items-center  flex-column">
    <h1 class="ttr">Welcome To My Blog</h1>
    <div>
        <a href="" class="btn btn-light">Start Reading</a>
    </div>
</div>
<div class="container d-flex justify-conetnt-center py-5 flex-column flex-md-row">
    <div class="col text-center">
        <img class="img-home" src="{{ asset('images/img.jpg') }}" alt="" srcset="">
    </div>
    <div class="col d-flex flex-column  align-items-start px-2">
        <h3>Welcome To our Social Netword</h3>
        <p class="py-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil soluta cumque assumenda eaque mollitia hic voluptatum delectus aperiam, error tempora in provident reprehenderit at aut minima vitae eum saepe aliquid.</p>
        <button class="btn btn-primary">Read More</button>
    </div>
</div>
<div class="category py-5 mb-2">
    <p class="text-center text-white display-6 py-4">Category</p>
    <div class="d-flex justify-content-around ">
        <a class="text-decoration-none text-white"href=""><h4>UX Design Thinking</h4></a>
        <a class="text-decoration-none text-white"href=""><h4>Programming Language</h4></a>
        <a class="text-decoration-none text-white"href=""><h4>Graphic Design</h4></a>
        <a class="text-decoration-none text-white"href=""><h4>Full-Stack Development</h4></a>
    </div>
</div>

@endsection



