@extends('layout.app')
@section('content')

    <style>
       
        .profileimg{
            width: 70px;
            height: 70px;
            border-radius:100%;
        }
        .singlepost{
            width: 800px;
            
        }
        .postimage{
            width: 800px;
            height: 400px;
        }
        
        .popup{
            width: 150px;
            height: fit-content;
            /* background: rgb(255, 255, 255); */
            position: absolute;
            right: 0px;
            /* display: none; */
        }
        .links:hover{
            color: #0d6efd !important;
            background: #FFF;
        }
        .show{
            display: block; 
        }
        .add{
            width: 200px;
        }
        #comment{
            width: 100%;
        }
    </style>
    
    <div class="feed container my-4 d-flex">
        
        @php
            $user = DB::table('users')
                    ->select('name')
                    ->where('id', '=', auth()->user()->id)
                    ->first();
        @endphp
        <div class="add text-start">
            <img src="/images/download.jpg" class="profileimg" alt="" srcset="">
            <span>{{ $user->name }}</span>
            <div class="my-3">
                posts: {{ DB::table('posts')->WHERE('user_id','=',auth()->user()->id)->count() }}<br>
                comments: {{ DB::table('comments')->WHERE('user_id','=',auth()->user()->id)->count() }}
            </div>
            <a class="btn btn-primary" href="/add">Add New Post</a>
        </div>
        
        <div d-flex flex-column>
            
            <h3 class="text-center display-6 my-4 ">Welcome To Our Social Network</h3>
            <div class="searchbar text-center">
                <input type="text" placeholder="search"> 
                <i class="bi bi-search mx-2 sr" id="searchbtn"></i>
            </div>
            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
        @foreach ($Ps as $P)
        <div class="singlepost  mx-auto">
            
            <div class="d-flex justify-content-between align-items-center ">
                <div class="first d-flex align-items-center">
                    <img class="profileimg" src="/images/download.jpg" alt="">
                    <div>
                        <p class="mx-3">{{$P->owner}}</p>
                        <span class="mx-3">3 hours Ago</span>
                        <i class="bi bi-globe-europe-africa"></i>
                    </div>
                </div>

                @if ($P->user_id == auth()->user()->id)
                <div class="second position-relative">
                    <i class="bi bi-three-dots" id="btndot"></i>
                    <div class="popup text-center bg-primary">
                        <a class="d-block py-2 text-decoration-none text-white links mb-1" href="/edit/{{$P->id}}">Update Post</a>
                        <a class="d-block py-2 text-decoration-none text-white links " href="/delete/{{$P->id}}"> Delete Post </a>
                    </div>
                </div>
                @endif


            </div>
            <div class="postdescription my-4">
                <h3>{{$P->title}}</h3>
                <p>
                    {{$P->description}}
                </p>
            </div>
            <div class="postimage">
                <img width="100%" height="100%" src="/uploaded/{{$P->image_path}}" alt="">
            </div>
            <div class="likescom d-flex">
                <div class="likes w-50 text-center">
                    <i class="bi bi-heart "></i>
                    {{-- <i class="bi bi-heart-fill text-danger"></i> --}}
                </div>
                <div class="comment w-50 text-center">
                    <a class="text-decoration-none" href="/display/{{$P->id}}"><i class="bi bi-chat"></i></a>
                </div>
            </div>
            
        </div> 
        @endforeach
    </div>   
    
    </div>
    

@endsection