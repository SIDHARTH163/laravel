
@extends('layouts.master')
@section('content')
{{-- crousel --}}

<div class="parallax " id="top">
  
  <div class="container rr " style="padding-top:8px">

  
    @if(session()->has('danger'))
    
  <div class="alert alert-danger" role="alert">
    {{ session()->get('danger') }}
  </div>
  @endif
  @if(session()->has('message'))
    
    <div class="alert alert-primary" role="alert">
      {{ session()->get('message') }}
    </div>
  @endif
    </div>
  <div class="col-sm-5 cr"><div class="col-md-6 cr1">
  <a href="#shop"> <button  class="btn btn-success bs">Continue To Shop</button>  </a>
 
 </div></div>
{{-- alert container --}}

{{-- parallax end --}}
</div>



       
         
     


<section>
  <div class="container-fluid shop" id="shop">
   <div class="boxesContainer">
<div class="row">
  @foreach ($products as $item)
     <div class="cardBox">
       <div class="card">
         <div class="front">
           
             <figure><img src="{{ asset('storage/images/'.$item->photo) }}" class="img-fluid" alt="..."></figure>
             <span>{{ substr($item->name, 0,50) }}...</span><br>
           
           
           
         </div>
         <div class="back">
           <h5>{{ substr($item->name, 0,90) }}...</h5>
           <p> Price:-&nbsp;{{ $item->price }}</p>
           <p class="h6">Status:-{{ $item->status }}</p>
           <a name="" id="" class="btn btn-primary bl" href="detail/{{$item->id}}" role="button">View</a>
         </div>
       </div>
     </div>
     @endforeach
     
    
     
   
   </div>
 
   <!--.boxesContainer-->
  </div>
  <div class="container bu  ">
   <a name="" id="" class="btn btn-success ln justify-content-center" href="pr" role="button"> BROWSE MORE PRODUCTS</a>
</div>
 </div>

 
 </section>
 
 <div class="container-fluid bg-light n ">
   

  <footer class="blog-footer container justify-content-center">
      <h5>Website build for the  final year project.<br>By Sidharth Guleria</h5>
      <p>
        <a href="#top">Back to top</a>
      </p>
    </footer>




</div>
@endsection