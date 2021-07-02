<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="Description" content="Enter your description here"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
<link rel="stylesheet" href="{{ asset('css/index.css') }}">

<title>Title</title>
</head>
<style>
  .nav-item:hover{
    background: rgb(143, 184, 142);
  }
  </style>
<body>
    {{View::make('admin.layouts.adminheader')}}
    <div class="container-fluid">
        <div class="row">
          <nav id="sidebarMenu" class="col-md-3 nv col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">
                    <span data-feather="home"></span>
                    @if(Session::has('user'))
     
                   welcome! {{Session::get('user')['fname']}}
                      
                   
                     
                        @endif
                       
                     
                  </a>
                </li><hr>
                <li class="nav-item">
                  <a class="nav-link" href="/addproducts">
                    <span data-feather="bar-chart-2"></span>
                    Add Products
                  </a>
                </li>
               <hr>
              
               
                <li class="nav-item">
                  <a class="nav-link" href="/viewproducts">
                          <span data-feather="shopping-cart"></span>
                         Electronics Products
                        </a>
                      </li><hr>
                      <li class="nav-item">
                        <a class="nav-link" href="/viewproducts1">
                                <span data-feather="shopping-cart"></span>
                               Fashion Products
                              </a>
                            </li><hr>
                            <li class="nav-item">
                              <a class="nav-link" href="/viewproducts2">
                                      <span data-feather="shopping-cart"></span>
                                     Coming-Soon Products
                                    </a>
                                  </li><hr>
                                  
                      <li class="nav-item">
                        <a class="nav-link" href="/customers">
                          <span data-feather="users"></span>
                          Customers
                        </a>
                      </li><hr>
                <li class="nav-item">
                  <a class="nav-link" href="/customerorders">
                    <span data-feather="file"></span>
                   View Orders
                  </a>
                </li><hr>
               
                
                
                <li class="nav-item">
                  <a class="nav-link" href="/addproducts">
                    <span data-feather="bar-chart-2"></span>
                     Back
                  </a>
                </li><hr>
               
              </ul>
      
              
              
            </div>
          </nav>
      
          <main class="col-md-9  pt ms-sm-auto col-lg-10 px-md-4 bg-light">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2 bg-light">Dashboard</h1>
              <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                  <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                  <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                  <span data-feather="calendar"></span>
                  This week
                </button>
              </div>
            </div>
      
            @yield('content')
      
            
            
            </div>
          </main>
        </div>
      </div>
   
  </body>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="{{ asset('js/dashboard.js') }}"></script>
</html>