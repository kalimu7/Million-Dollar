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
            width: 100px;
            height: 100px;
            background: black;
            position: absolute;
            right: 82px;
        }
    </style>

    <div class="feed container my-4 ">
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
                <div class="second">
                    <i class="bi bi-three-dots" id="btndot"></i>
                    <div class="popup">
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
        </div>
    </div>

@endsection