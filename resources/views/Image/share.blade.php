
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<div class="card">
    <div class="card-header">
        <h4>Image Share</h4>
    </div>
    <div class="card-body">


        <form method="post"  action="{{url('send',$image->id)}}" enctype="multipart/form-data">

            @csrf

            <div>

                @if($image->image)

                    <img style="width:150px; margin-left:44%;" src="{{asset('assets/images/'.$image->image)}}"  alt="">

                @endif



{{--                                 dropdown users--}}


                    <div class="container my-4 text-info bg-dark" >
                        <select class="mdb-select md-form" style="margin-left:40%;"  name="per" searchable="Search here..">

                            <option value="" style="text-align:center;" disabled selected>Permission</option>

                            @foreach($all_user as $user)
                                <option value="{{$user->email}}">{{$user->email}}</option>
                            @endforeach

                        </select>
                    </div>
                <div class="col-md-10">
                    <button class="btn btn-primary text-info bg-dark" value="" style="margin-left:57%; margin-top:10px;">Send</button>
                </div>
            </div>
        </form>
    </div>
</div>
