<?php 
use App\Http\Controllers\ProductsController;
$total=0;
if(Session::has('user'))
{
  $total= ProductsController::cartItem();
}

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/myorders">Orders</a>
          </li>
         
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="/cartlist" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              cart({{$total}})
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              @if(Session::has('user'))
              <li><a class="dropdown-item" href="#">Welcome&nbsp{{Session::get('user')['name']}}</a></li>
              <li><a class="dropdown-item" href="/cartlist">Your Cart</a></li>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
              
            </ul>
          </li>
          @else
            <li><a href="/login">Login</a></li>
            @endif
         
        </ul>
       
       
      </div>
      <form action="/search" class="d-flex">
        <input class="form-control me-2" type="search" name="query"placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </nav>