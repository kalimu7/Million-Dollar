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
            display: none;
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
    </style>
    
    <div class="feed container my-4 d-flex">
        <div class="add">
            <h3>Welcome To Our Social Network</h3>
            <a class="btn btn-primary" href="/add">Add New Post</a>
        </div>
        <div class="singlepost  mx-auto">
            <div class="d-flex justify-content-between align-items-center ">
                <div class="first d-flex align-items-center">
                    <img class="profileimg" src="/images/download.jpg" alt="">
                    <div>
                        <p class="mx-3">Abdelkarim Mahjour</p>
                        <span class="mx-3">3 hours Ago</span>
                        <i class="bi bi-globe-europe-africa"></i>
                    </div>
                </div>    
                <div class="second position-relative">
                    <i class="bi bi-three-dots" id="btndot"></i>
                    <div class="popup text-center bg-primary">
                        <a class="d-block py-2 text-decoration-none text-white links mb-1" href="">Update Post</a>
                        <a class="d-block py-2 text-decoration-none text-white links " href=""> Delete Post </a>
                    </div>
                </div>
            </div>
            <div class="postdescription my-5">
                <h3>Title of Post</h3>
                <p>
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus, laudantium iusto quisquam, expedita ex officia quia eveniet omnis placeat facere voluptas accusantium praesentium quidem. Fugit sint minus unde cum quas.
                </p>
            </div>
            <div class="postimage">
                <img width="100%" height="100%" src="/images/pexels-magnus-mueller-2818118.jpg" alt="">
            </div>
            <div class="likescom d-flex">
                <div class="likes w-50 text-center">
                    <i class="bi bi-heart "></i>
                    {{-- <i class="bi bi-heart-fill text-danger"></i> --}}
                </div>
                <div class="comment w-50 text-center">
                    <i class="bi bi-chat"></i>
                </div>
            </div>
        </div>    
    </div>
    

@endsection