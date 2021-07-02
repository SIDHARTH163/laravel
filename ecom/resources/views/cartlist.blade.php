@extends('layouts.master')
@section('content')
@foreach($products as $product)
<div class="container">
  <div class="container">
    @if(session()->has('warning'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
   
@endif
    <div class="row">
   <div class="col-sm-3">
    <img src="{{ asset('storage/images/'.$product->photo) }}" class="card-img" alt="...">
    
   </div>
      <div class="col-sm-9">
          <div class="title">
            <a href="detail/{{$product->id}}">     {{$product->name}}</a>
            
          </div>
          <div class="details">
            Price:- 
           </div>
           <div class="details1">
            {{$product->price}}
             </div>
          <div class="details">
           Details:- 
          </div>
          <div class="details1">
            {{$product->desc}}
             </div>
          
          
            <a href="/removecart/{{$product->cart_id}}" class="btn btn-warning" >removecart</a> 
            <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br>
      </div>
      
    </div>
    
</div>

@endforeach













          
          
        
@endsection