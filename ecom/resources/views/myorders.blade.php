@extends('layouts.master')
@section('content')

@foreach($orders as $item)
<div class="container">
  <div class="row">
 <div class="col-sm-3">
  <img src="{{ asset('storage/images/'.$item->photo) }}"class="card-img" alt="...">
  
 </div>
    <div class="col-sm-9">
        <div class="title">
          {{$item->name}}
          
        </div>
        <div class="details">
          Address:- 
         </div>
         <div class="details1">
          {{$item->address}}
           </div>
        <div class="details">
        Delivery:- 
        </div>
        <div class="details1">
         {{ $item->status }}
           </div>
        <div class="details">
         Payment_status:- 
        </div>
        <div class="details1">
          {{ $item->payment_status }}
         </div>
         <div class="details">
          Payment_method:- 
         </div>
         <div class="details1">
           {{ $item->payment_method }}
          </div>
         
    </div>
    
  </div>
</div>
@endforeach
@endsection