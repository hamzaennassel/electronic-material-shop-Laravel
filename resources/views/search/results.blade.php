
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>App Name - search</title>

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

		<!-- Custom stlylesheet -->
		<link rel="stylesheet" href="{{ asset('web/css/style.css') }}">
		<link rel="stylesheet" href="{{ asset('web/css/About.css') }}">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
	@if(session()->has('success'))
                 <div class="alert alert-success">
                 {{ session('success') }}
                  </div>
              @endif
    <div class="row">
  @foreach($produits as $product)
    <div class="col-md-4 mb-4">
      <div class="card">
        <img class="card-img-top" src="{{ asset('web/img/' . $product->image) }}" alt="">
        <div class="card-body">
          <h5 class="card-title">{{ $product->titre }}</h5>
          <p class="card-text">{{ $product->description }}</p>
          <p class="card-text"><strong>{{ $product->prix }}.00 Dh</strong></p>
      
          <form method="POST" action="{{ route('ajouterAuPanier') }}">
            @csrf
            <input type="hidden" name="produit_id" value="{{$product->id}}">
            <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
         </form>
        </div>
      </div>
    </div>
  @endforeach
</div>

        </body>
        </html>
