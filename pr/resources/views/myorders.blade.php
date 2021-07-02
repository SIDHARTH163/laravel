@extends('layouts.master')
@section('content')
<div class="parallax">
@foreach($orders as $item)
<div class="container-fluid ">
  <div class="row">
 <div class="col-sm-3 dt">
  <img src="{{ asset('storage/images/'.$item->photo) }}"class="img-fluid" alt="...">
  
 </div>
    <div class="col-sm-7 ddt">
        <div class="title">
          <p><h4 class="text-sm-start ht ">  {{$item->name}}</h4><p><br>
          
        </div>
        <div class="details">
           <p class="text-sm-start htt "><h5 class="text-sm-start ht ">Address:- </h5>  {{$item->address}}</p>
         </div>
         
         <div class="details">
          <p class="text-sm-start htt "><h5 class="text-sm-start ht ">Delivery:- </h5>  {{$item->status}}</p>
         </div>
      
          <div class="details">
           <p class="text-sm-start htt "><h5 class="text-sm-start ht ">Payment-status:- </h5>    {{ $item->payment_status }}</p>
           </div>
       
        
         
           <div class="details">
            <p class="text-sm-start htt "><h5 class="text-sm-start ht ">Payment-method:- </h5>    {{ $item->payment_method }}</p>
            </div>
            <div class="details">
              <p class="text-sm-start htt "><h5 class="text-sm-start ht ">Date:- </h5>    {{ $item->created_at }}</p>
              </div>
        
         
    </div>
    
  </div>
</div><hr>
@endforeach
</div>
@endsection