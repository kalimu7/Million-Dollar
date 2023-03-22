@extends('layout.app')
@section('content')
{{-- @if(empty($PC[0]->owner))
@endif --}}
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
            resize: none
        }
    </style>
    
    <div class="feed container my-4 d-flex">
        <div class="add">
            <h3>Welcome To Our Social Network</h3>
            <a class="btn btn-primary" href="/add">Add New Post</a>
            
        </div>
        
       <div d-flex flex-column>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        
        <div class="singlepost  mx-auto">
        
            
          
            <div class="d-flex justify-content-between align-items-center ">
                <div class="first d-flex align-items-center">
                    <img class="profileimg" src="/images/download.jpg" alt="">
                    <div>
                        <p class="mx-3">{{$PC[0]->owner}}</p>
                        <span class="mx-3">3 hours Ago</span>
                        <i class="bi bi-globe-europe-africa"></i>
                    </div>
                </div>

                

            </div>
            <div class="postdescription my-4">
                <h3>{{$PC[0]->title}}</h3>
                <p>
                    {{$PC[0]->description}}
                </p>
            </div>
            <div class="postimage">
                <img width="100%" height="100%" src="/uploaded/{{$PC[0]->image_path}}" alt="">
            </div>
            {{-- <div class="likescom d-flex">
                <div class="likes w-50 text-center">
                    <i class="bi bi-heart "></i> --}}
                    {{-- <i class="bi bi-heart-fill text-danger"></i> --}}
                {{-- </div>
                <div class="comment w-50 text-center">
                    <i class="bi bi-chat"></i>
                </div>
            </div> --}}
            <div class="inputs my-2">
                <form action="http://127.0.0.1:8000/Addcomment" method="Post">
                    @csrf
                    <input type="text" name="post_id" value="{{$idpost}}">
                    <input type="text" name="user_id"value="{{ Auth::user()->id}}">
                    <textarea  name="comment" id="comment" rows="2" placeholder="Write your comment in this section" ></textarea>
                    <button type="submit" class="btn btn-outline-primary" >Add Comment</button>
                </form>
            </div>

            @if(!empty($PC[0]->comment))
                <div class="comments">
                    {{-- **************************just dump update********************* --}}
                    @for($i=0;$i<count($PC);$i++)
                        <div class="my-5">
                            <div class="first d-flex align-items-center">
                                <img class="profileimg" src="/images/download.jpg" alt="">
                                <div>
                                    <p class="mx-3">{{$PC[$i]->name}}</p>
                                    <span class="mx-3">3 hours Ago</span>
                                    <i class="bi bi-globe-europe-africa"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-warning my-3 d-inline">Comments : </h4> <span>{{$PC[$i]->comment}}</span>
                                
                            </div>
                        </div>
                @endfor
                </div>
            @endif
        </div> 
        
        </div>   
    </div>
    

@endsection