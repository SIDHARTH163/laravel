
@extends('layouts.master')
@section('content')

<div class="container">
  @if(session()->has('warning'))
    
  <div class="alert alert-danger" role="alert">
    {{ session()->get('warning') }}
  </div>
@endif
  @if(session()->has('message'))
    
    <div class="alert alert-primary" role="alert">
      {{ session()->get('message') }}
    </div>
@endif
  <div class="row">
        @foreach ($products as $item)
     
       
        
        <div class="card" style="width: 17rem;">
          <img src="{{ asset('storage/images/'.$item->photo) }}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{ substr($item->name, 0, 90) }}</h5>
            <p class="card-text">{{ $item->price }}</p>
            <a href="detail/{{$item->id}}" class="btn btn-primary">View Product</a>
           
          </div>
        </div>
      @endforeach
    </div>
</div>
@endsection