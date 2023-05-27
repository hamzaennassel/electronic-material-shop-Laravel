<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  @include('admin.head')
<style>
            body{
            margin-top: 50px;
            background-color: #f1f1f1;
            }
            .nav-pills .nav-link.active, .nav-pills .show > .nav-link{
            background-color: #17A2B8;
            }
            .dropdown-menu{
            top: 60px;
            right: 0px;
            left: unset;
            width: 460px;
            box-shadow: 0px 5px 7px -1px #c1c1c1;
            padding-bottom: 0px;
            padding: 0px;
            }
            .dropdown-menu:before{
            content: "";
            position: absolute;
            top: -20px;
            right: 12px;
            border:10px solid #343A40;
            border-color: transparent transparent #343A40 transparent;
            }
            .head{
            padding:5px 15px;
            border-radius: 3px 3px 0px 0px;
            }
            .footer{
            padding:5px 15px;
            border-radius: 0px 0px 3px 3px;
            }
            .notification-box{
            padding: 10px 0px;
            }
            .bg-gray{
            background-color: #eee;
            }
            @media (max-width: 640px) {
            .dropdown-menu{
            top: 50px;
            left: -16px;
            width: 290px;
            }
            .nav{
            display: block;
            }
            .nav .nav-item,.nav .nav-item a{
            padding-left: 0px;
            }
            .message{
            font-size: 13px;
            }
            }
</style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
   @include('admin/main-headerbar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
     @include('admin/main-sidebar')
    
      <!-- partial -->
      <div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-header">Statistiques générales</div>
                <div class="card-body">
                    <p>Nombre total d'utilisateurs enregistrés : <span class="font-weight-bold">{{ $totalUsers }}</span></p>
                    <p>Nombre total de commandes passées : <span class="font-weight-bold">{{ $totalCommands }}</span></p>
                    <p>Montant total des ventes réalisées : <span class="font-weight-bold">{{ $totalSales }}</span></p>
                    <p>Nombre total de produits disponibles : <span class="font-weight-bold">{{ $totalProducts }}</span></p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-header">Graphique des ventes</div>
                <div class="card-body">
                    <canvas id="salesChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-header">Dernières commandes</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($latestCommands as $command)
                        <li class="list-group-item">
                            <span class="font-weight-bold text-white">{{ $command->numero }}</span><br>
                            <span class="text-muted">Date : {{ $command->date_commande }}</span><br>
                            <span class="text-muted">Montant : {{ $command->montant }}</span><br>
                            <span class="text-muted">Statut : {{ $command->statut }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-primary text-white">
                <div class="card-header">Produits populaires</div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach ($popularProducts as $product)
                        <li class="list-group-item">
                            <span class="font-weight-bold text-white">{{ $product->titre }}</span><br>
                            <span class="text-muted">Quantité vendue : {{ $product->total_quantity }}</span><br>
                            <span class="text-muted">Revenu généré : {{ $product->total_revenue }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

        
                
                   
     
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        @include('admin.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

 @include('admin/footer-scripts')
</body>

</html>

