<?php 
use App\Http\Controllers\UController;
$total=0;
if(Session::has('user'))
{
  $total= UController::cartItem();
}

?>



       

     <nav class="navbar navbar-expand-lg vb  sticky-top navbar-dark bg-dark" aria-label="Tenth navbar example">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Ecomerce</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample08" aria-controls="navbarsExample08" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse justify-content-md-end" id="navbarsExample08">
          <ul class="navbar-nav">
            
            
            <li class="nav-item">
              <form action="/search" class="d-flex">
                <input class="form-control me-2" type="search" name="query"placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-danger" type="submit">Search</button>
              </form>
            </li>
            
            <li class="nav-item dropdown ">
              
              <a class="nav-link dropdown-toggle db" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                cart({{$total}})
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if(Session::has('user'))
                <li><a class="dropdown-item" href="#">{{Session::get('user')['fname']}}</a></li>
                <li><a class="dropdown-item" href="/cartlist">Your Cart</a></li>
                <li><a class="dropdown-item" href="/myorders">Your Orders</a></li>
                <li><a class="dropdown-item" href="/logout1">Logout<div class="spinner-border text-primary" role="status">
                  <span class="visually-hidden">Loading...</span>
                </div></a></li>
                
              </ul>
            </li>
            @else
              
              <li><a class="dropdown-item" href="/login">Login<div class="spinner-border text-danger" role="status">
                <span class="visually-hidden">Loading...</span>
              </div></a></li>
              @endif
            </li>
             
           
          </ul>
          
        </div>
       
      </div>
    </nav>
   
  <style>
    
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }
  
    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
    .nav-link{
        color: black;
        font-weight: bold;
    }
    .vb{
      box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;
    }
    .nb{
        font-weight: bold;
    }
    .d-flex{
        margin-left: 1vh;
    }
    .db{
        margin-right:15vh;
    }
    .bg{
      border-radius: 0px;
    }
    
    .nf{
      float:right;
    }
  </style>
  <div class="container-fluid vb">
  <nav class="nav nav-pills nav-fill">
    <a class="nav-link" href="/index"> <button class="btn btn-outline-danger bg " >Home</button></a>
    <a class="nav-link" href="/electronics"> <button class="btn btn-outline-danger bg " >Electronics</button></a>
    <a class="nav-link" href="/fashion"> <button class="btn btn-outline-danger bg" >Fashion</button></a>
    <a class="nav-link" href="/comingsoon"> <button class="btn btn-outline-danger bg" >Ariving-soon</button></a>
    
  </nav>
  
</div>
    