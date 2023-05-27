<h1>Edit Commande</h1>

<form action="{{route('commande.update',$commande->id)}}" method="Post" enctype="multipart/form-data">
<!--<form action="{{url('post/insert')}}" method="Post">-->
    @csrf
    @method('put')
<input type="text" name="montant" value="{{$commande->montant}}"><br><br>
<input type="text" name="date_commande" value="{{$commande->date_commande}}"><br><br>
<input type="text" name="statut" value="{{$commande->statut}}"><br><br>

<input type="submit" value="save">

</form>
