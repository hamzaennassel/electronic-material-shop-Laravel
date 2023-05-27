
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

        <title>index</title>
    </head>
    <body>
    <table class="table">
  <thead>
      
      <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
   
   
    </tr>

  </thead>
   

@foreach($users as $user)
<tr>
    <th scope="col">{{$user->id}}</th>
  <th scope="col">{{$user->name}}</th>
   <th scope="col">{{$user->email}}</th>
   
  
   <th><a class="btn btn-primary" href="{{route('user.edit',$user->id)}}" role="button">Edit</a></th>
   <th>
    <form action="{{ route('user.delete', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Delete</button>
    </form>
</th>

</tr>
@endforeach
</table>

    </body>
    </html>

