
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
      <br>
      &nbsp<a class="btn btn-primary" href="{{route('produit.create')}}" role="button">Create new product</a>
      <tr>
      <th scope="col">#</th>
      <th scope="col">ref</th>
      <th scope="col">categorie</th>
      <th scope="col">nom</th>
      <th scope="col">description</th>
      <th scope="col">image</th>
      <th scope="col">prix</th>
      <th scope="col">stock</th>
    </tr>

  </thead>
   

@foreach($produits as $produit)
<tr>
    <th scope="col">{{$produit->id}}</th>
  <th scope="col">{{$produit->ref}}</th>
   <th scope="col">{{$produit->categorie}}</th>
   <th scope="col">{{$produit->titre}}</th>
   <th scope="col">{{$produit->description}}</th>
   <th scope="col">{{$produit->image}}</th>
   <th scope="col">{{$produit->prix}}</th>
   <th scope="col">{{$produit->stock}}</th>
   <th><a class="btn btn-primary" href="{{route('produit.edit',$produit->id)}}" role="button">Edit</a></th>
   <th>
    <form action="{{ route('produit.destroy', $produit->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
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

