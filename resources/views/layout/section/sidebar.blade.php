<nav class="navbar navbar-expand-lg navbar-light bg-secondary fixed-top">
      <a class="navbar-brand" href="#"><i class="bi bi-book mr-2"></i></i> Restaurant</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active"></li>
        </ul>
          <a href="{{ route('signout') }}">
          <button class="btn btn-outline-link my-2 my-sm-0" type="submit"><i class="bi bi-box-arrow-right" data-toggle="tooltip" title="Log Out"></i></button>
          </a>
      </div>
    </nav>

    <div class="row no-gutters mt-5">
      <!-- SideBar -->
      <div class="col-md-2 bg-light mt-2 pr-3 pt-4 pb-5">
        <ul class="nav flex-column ml-3 mb-3">
          <li class="nav-item">
            <a class="nav-link text-dark" href="/dashboard"><i class="bi bi-house"></i> Home</a>
            <hr class="bg-secondary" />
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('customer.index') }}"><i class="bi bi-person mr-2"></i> Customer</a>
            <hr class="bg-secondary" />
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('menu.index') }}"><i class="bi bi-card-list mr-2"></i> Menu</a>
            <hr class="bg-secondary" />
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#"><i class="bi bi-people mr-2"></i> Member</a>
            <hr class="bg-secondary" />
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="{{ route('order.index') }}"><i class="bi bi-bag mr-2"></i> Order</a>
            <hr class="bg-secondary" />
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#"><i class="bi bi-currency-dollar mr-2"></i> Payment</a>
            <hr class="bg-secondary" />
          </li>
        </ul>
      </div>
      
      <!-- Akhir SideBar -->