<h1>Edit produit</h1>

<form action="{{route('produit.update',$produit->id)}}" method="Post" enctype="multipart/form-data">
<!--<form action="{{url('post/insert')}}" method="Post">-->
    @csrf
    @method('put')
<input type="text" name="ref" value="{{$produit->ref}}"><br><br>
<input type="text" name="categorie" value="{{$produit->categorie}}"><br><br>
<input type="text" name="titre" value="{{$produit->titre}}"><br><br>
<textarea name="description">{{ $produit->description }}</textarea><br><br>
@if($produit->image)
    <img src="{{ Storage::url('imgs/produits/' . $produit->image) }}" alt="Product Image" width="100"><br><br>
@endif
<input type="file" name="photo"><br><br>
<input type="text" name="prix" value="{{$produit->prix}}"><br><br>
<input type="text" name="stock" value="{{$produit->stock}}"><br><br>
<input type="submit" value="save">

</form>
