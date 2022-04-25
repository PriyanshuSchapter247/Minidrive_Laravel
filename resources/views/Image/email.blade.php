<!DOCTYPE html>
<html>
<head>
    <title>Chapter.com</title>
</head>
<body>

{{--@foreach($image as $item)--}}
<tr>

    <td>Hello  {{$name}}</td>
    <hr>
    <td>{{Auth::user()->email}}</td>

<td>
{{--    <input type="text" class="form-control" onclick="this.select()" value="{{asset('assets/images/'.$image)}}" />--}}
</td>

{{--    <td>http://127.0.0.1:8000/recive-image</td>--}}



</tr>
{{--@endforeach--}}

</body>
</html>
