@extends('layouts.master')
@section('content')


<div class="parallax">
  <div class="container-fluid">
    <div class="row">
    <div class="col-sm-3 dt">
      
      <img src="{{ asset('storage/images/'.$product['photo']) }}" class="img-thumbnail" alt="..."><br>
      
    </div>
    <div class="col-sm-7 ddt  ">
      <p><h4 class="text-sm-start ht "> {{$product['name']}}&nbsp;&nbsp; {{$product['price']}} </h4>  </p><br>
        <p class="h6">Status:-{{$product['status']}}</p>
        <p class="text-sm-start htt "><h5 class="text-sm-start ht ">Product Description:- </h5>  {{$product['desc']}}</p>
        <p class="text-sm-start htt "><h5 class="text-sm-start ht ">Product Features:- </h5>   {{$product['features']}}</p>
       
      </div>
    
  </div>
  </div>
  <div class="container ii">
    <div class="row">
    <div class='col-sm-4 mt'>
      <a name="" id="" class="btn btn-danger ln " href="/index" role="button">Back To Home</a>
    </div>
    <div class='col-sm-4 mt'>
      <form action="/add_to_cart" method="POST">
        @csrf
        <input type="hidden" name="product_id" value={{$product['id']}}>
    <button class="btn btn-success ln">Add to Cart</button>
    </form>
     
    </div>
    <div class='col-sm-4 mt'>
      <a name="" id="" class="btn btn-primary ln " href="/login" role="button">Login From Here</a>
    </div>
  </div>
  </div>
</div>



@endsection