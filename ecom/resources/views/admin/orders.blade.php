
@extends('admin.layouts.master')
@section('content')
<div class="container top">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
           @if(Session::has('admin'))
     
        as! {{Session::get('admin')['name']}}
           
        
          
             @endif
    </div>
   
@endif
<div class="alert alert-primary alert-dismissible fade show" role="alert">
  <strong>Hiii!</strong> You can now view all orders by customers.    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<table class="table">
    <thead>
      <tr class="table-dark">
        <th scope="col">#</th>
        <th scope="col">Product Id</th>
        <th scope="col">Staus</th>
        <th scope="col">Payment Method</th>
        <th scope="col">Payment Status</th>
        <th scope="col">Updated At</th>
      </tr>
    </thead>
    @foreach ($orders as $user)
    <tr class="table-primary">
    <td>{{ $user->id }}</td>
    <td>{{ $user->product_id }}</td>
    <td>{{ $user->status }}</td>
    <td>{{ $user->payment_method }}</td>
    <td>{{ $user->payment_status }}</td>
    <td>{{ $user->updated_at }}</td>
    
    </tr>
   
    @endforeach
  </table>
</div>

@endsection
