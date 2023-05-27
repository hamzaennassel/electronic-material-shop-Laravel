<h1>Edit user</h1>

<form action="{{route('user.update',$user->id)}}" method="Post" enctype="multipart/form-data">
<!--<form action="{{url('post/insert')}}" method="Post">-->
    @csrf
    @method('put')
<input type="text" name="name" value="{{$user->name}}"><br><br>
<input type="text" name="email" value="{{$user->email}}"><br><br>

<input type="submit" value="save">

</form>
