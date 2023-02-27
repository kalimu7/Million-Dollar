@extends('layout.app')
@section('content')

<style>
    body {
    font-family: 'Lato', sans-serif;
}

h1 {
    margin-bottom: 40px;
}

label {
    color: #333;
}

.btn-send {
    font-weight: 300;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    width: 100%;
    margin-left: 3px;
    }
.help-block.with-errors {
    color: #ff5050;
    margin-top: 5px;

}

.card{
	margin-left: 10px;
	margin-right: 10px;
}

</style>


<div class="container my-5">
    <div class=" text-center mt-5 ">

        <h1 >Add New Post</h1>
    
        
    </div>


<div class="row ">
  <div class="col-lg-7 mx-auto">
    <div class="card mt-2 mx-auto p-4 bg-light">
        <div class="card-body bg-light">
   
        <div class = "container">
    <form id="contact-form" role="form" action="ajoute" method="POST" enctype="multipart/form-data" >
            @csrf
            

            <div class="controls">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_name">title</label>
                            <input id="form_name" type="text" name="title" class="form-control" placeholder="Please enter your firstname *"  data-error="Firstname is required.">
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_email">image</label>
                            <input id="form_email" type="file" name="image" class="form-control" placeholder="Please enter your email *"  data-error="Valid email is required.">
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="form_need">Category</label>
                            <select id="form_need" name="category" class="form-control"  data-error="Please specify your need.">
                                <option value="" selected disabled>--Select Your Issue--</option>
                                <option >Sport</option>
                                <option >IT</option>
                                <option >Ai</option>
                                <option >Other</option>
                            </select>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="form_message">Description *</label>
                            <textarea id="form_message" name="Description" class="form-control" placeholder="Write your message here." rows="4"  data-error="Please, leave us a message."></textarea>
                        </div>

                    </div>


                    <div class="col-md-12">
                        
                        <input type="submit" class="btn btn-primary btn-send  pt-2 btn-block my-2" value="Add Post" >
                    
                    </div>
        
                </div>


        </div>
     </form>
    </div>
        </div>


</div>
    <!-- /.8 -->

</div>
<!-- /.row-->

</div>
</div>
@endsection