<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <i class="icon-grid-2 menu-icon"></i>
              <span class="menu-title">Tables</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('produit.index')}}">Produit</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('commande.index')}}">Commande</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('user.index')}}">User</a></li>
              </ul>
            </div>
          </li>
         
         
          <li class="nav-item">
            <a class="nav-link" href="{{route('Home')}}">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">User Pages</span>
            </a>
          </li>

         
          <li class="nav-item">
            <a class="nav-link" href="https://laravel.com/docs/8.x">
              <i class="icon-paper menu-icon"></i>
              <span class="menu-title">Documentation</span>
            </a>
          </li>
        </ul>
      </nav>