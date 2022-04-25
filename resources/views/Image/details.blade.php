<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<link href="//cdn.jsdelivr.net/npm /bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

<script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h1>Details page</h1>
            <hr>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>S.No</th>
                    <th>ID</th>
                    <th>Owner</th>
                    <th>title</th>
                    <th>image</th>
                    <th>Path</th>

                </tr>
                </thead>
                <tbody>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible">
                        <p>{{ $message }}</p>
                    </div>
                @endif
{{--                @foreach(data($image, $all_user) as $item)--}}
{{--                @foreach($image as $item && $all_user as $data)--}}
{{--                    @foreach($image as $item => $all_user)--}}


                @foreach($image as $item)
                @foreach($all_user as $data)

                    <tr>
                        <td> {{ $loop->iteration }} </td>
                        <td>{{$item->id}}</td>
{{--                                        @foreach($all_user as $item)--}}
                        <td>{{$data->email}}</td>
                        {{--                @endforeach--}}
                        <td>{{$item->title}}</td>
                        <td>
                            <img src="{{asset('assets/images/'.$item->image)}}"  style="width:40px" class=" img-thumbnail" alt="image here"> {{$item->image}}
                        </td>

                        <td>
                            <input type="text" class="form-control" onclick="this.select()" value="{{asset('assets/images/'.$item->image)}}" />
                        </td>
                    </tr>

                @endforeach
                @endforeach

                </tbody>
            </table>

        </div>
    </div>
</div>
