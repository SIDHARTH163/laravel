@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row">
   <div class="col-sm-3">
    <img src="{{ asset('storage/images/'.$product['photo']) }}" class="card-img" alt="...">
    
   </div>
      <div class="col-sm-9">
          <div class="title">
            {{$product['name']}}
            
          </div>
          <div class="details">
            Price:- 
           </div>
           <div class="details1">
            {{$product['price']}}
             </div>
          <div class="details">
           Details:- 
          </div>
          <div class="details1">
            {{$product['desc']}}
             </div>
          <div class="details">
           Features:- 
          </div>
          <div class="details1">
            {{$product['features']}}
           </div>
           <form action="/add_to_cart" method="POST">
            @csrf
            <input type="hidden" name="product_id" value={{$product['id']}}>
        <button class="btn btn-primary addcart">Add to Cart</button>
        </form>
      </div>
      
    </div>
</div>
@endsection