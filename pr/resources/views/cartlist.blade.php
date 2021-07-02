@extends('layouts.master')
@section('content')
<div class="container rr " style="padding-top:8px">

  
  
  @if(session()->has('message'))
    
    <div class="alert alert-primary" role="alert">
      {{ session()->get('message') }}
    </div>
  @endif
    </div>
@foreach($products as $product)
<div class="parallax">
  
<div class="container-fluid ">
  
    

    <div class="row">
   <div class="col-sm-3 dt">
    <img src="{{ asset('storage/images/'.$product->photo) }}" class="img-fluid" alt="...">
    
   </div>
      <div class="col-sm-7 ddt">
          <div class="title">
          
            <p><h4 class="text-sm-start ht ">  {{$product->name}}</h4><p><br>
          </div>
          <div class="details">
            <p class="text-sm-start htt "><h5 class="text-sm-start ht ">Product Description:- </h5>  {{$product->price}}</p>
           </div>
           
          <div class="details">
       
           <p class="text-sm-start htt "><h5 class="text-sm-start ht ">Product Description:- </h5>  {{$product->desc}}</p>
          </div>
          
          
          
            <a href="/removecart/{{$product->cart_id}}" class="btn btn-warning" >removecart</a> 
            <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br>
      </div>
      
    </div>
    
</div><hr>
</div>
@endforeach













          
          
        
@endsection