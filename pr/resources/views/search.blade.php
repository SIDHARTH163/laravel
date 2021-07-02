@extends('layouts.master')
@section('content')
<div class="container-fluid bg-light">
  <div class="container">
    <style>
      .container{
        box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;
        border-radius: 20px;
        background: white;
        
      }
        .img{
          
            padding:20px;
        }
        .tr{
            border:none;
            padding:10px;
        }
        
        </style>

    <table class="table">
        <thead>
          <tr>
           
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">price</th>
          </tr>
        </thead>
        <tbody>
            @foreach($products as $item)
          <tr>
            
             <td ><a class="card-title" href="detail/{{$item['id']}}"  >  {{$item['name']}} </a></td>
            <td><img src="{{ asset('storage/images/'.$item['photo']) }}"class="img" width="100px" height="150px" ></td>
          <td><a class="card-title" href="deatils/{{ $item['id'] }}" > {{$item['price']}} </a></td>
          </tr>
         
            @endforeach
         
        </tbody>
      </table>
    </div>
</div>
@endsection