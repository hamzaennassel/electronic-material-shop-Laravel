
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>App Name - Panier</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link rel="stylesheet" href="{{ asset('web/css/bootstrap.min.css') }}">

		<!-- Slick -->
		
		<link rel="stylesheet" href="{{ asset('web/css/slick.css') }}">
		<link rel="stylesheet" href="{{ asset('web/css/slick-theme.css') }}">

		<!-- nouislider -->
		<link rel="stylesheet" href="{{ asset('web/css/nouislider.min.css') }}">

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{ asset('web/css/font-awesome.min.css') }}">
    <script src="{{ asset('web/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('web/js/jquery-3.3.1.slim.min.js') }}"></script>
    </head>
	<body>
@if(Cart::count() >0)
<div class="px-4 px-lg-0">
  <div class="pb-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

          <!-- Shopping cart table -->
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="border-0 bg-light">
                    <div class="p-2 px-3 text-uppercase">Product</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Price</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Quantity</div>
                  </th>
                  <th scope="col" class="border-0 bg-light">
                    <div class="py-2 text-uppercase">Remove</div>
                  </th>
                  <th>
                    <button type='submit' class="text-dark"><a href="{{route('panier.removeAll')}}">Remove All<a></button>
                  </th>
                </tr>
              </thead>
              @if(session()->has('success'))
                 <div class="alert alert-success">
                 {{ session('success') }}
                  </div>
              @endif

              <tbody>
              @foreach(Cart::content() as $product)
              <tr>
                  <th scope="row" class="border-0">
                    
                      <img src="{{ asset('web/img/' . $product->model->image) }}" alt="" width="70" class="img-fluid rounded shadow-sm">
                      <div class="ml-3 d-inline-block align-middle">
                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle">{{$product->model->titre}} </a></h5><span class="text-muted font-weight-normal font-italic d-block">Category:{{$product->model->categorie}} </span>
                      </div>
                    
                  </th>
                  <td class="border-0 align-middle"><strong>{{$product->model->prix}},00 dh</strong></td>
                  <td class="border-0 align-middle">
                    <strong>{{$product->qty}}</strong>
                  </td>
                  <td class="border-0 align-middle">
                  <Form action="{{route ('panier.remove' , $product->rowId)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-dark"><i class="fa fa-trash"></i></button>
                  </Form>
                  </td>
                  <td>
                  <Form action="{{route('commande.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="qty" value="{{$product->qty}}">
                        <input type="hidden" name="produit_id" value="{{$product->id}}">
                        <button type="submit" class="text-dark"><a>Commander</a></button>
                  </Form>
                  </td>
                </tr>

            @endforeach
              </tbody>
            </table>
            
          </div>
          <!-- End -->
        </div>
      </div>
@else
<div class="col-md-12"><h3> Votre panier est vide<h3>
</div>
@endif
</div class="col-md-4">&nbsp&nbsp
<button  class="text-dark"><a href="{{route('categorie')}}">Retour</a></button>
</div>
</body>
</html>