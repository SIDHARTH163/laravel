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
<body>
    {{View::make('admin.layouts.header')}}
    <div class="container-fluid">
        <div class="row">
          <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="#">
                    <span data-feather="home"></span>
                    @if(Session::has('admin'))
     
                   welcome! {{Session::get('admin')['name']}}
                      
                   
                     
                        @endif
                       
                     
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/customerorders">
                    <span data-feather="file"></span>
                   View Orders
                  </a>
                </li>
                <li class="nav-item">
            <a class="nav-link" href="/viewproducts">
                    <span data-feather="shopping-cart"></span>
                   View Products
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/customers">
                    <span data-feather="users"></span>
                    Customers
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/addproducts">
                    <span data-feather="bar-chart-2"></span>
                    Add Products
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/addadmin">
                    <span data-feather="bar-chart-2"></span>
                    Add Admin
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/">
                    <span data-feather="layers"></span>
                    Back to Home
                  </a>
                </li>
              </ul>
      
              
              
            </div>
          </nav>
      
          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
              <h1 class="h2">Dashboard</h1>
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