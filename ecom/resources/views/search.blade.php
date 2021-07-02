@extends('layouts.master')
@section('content')
<div class="container">
    <style>
        .img{
          
            padding:10px;
        }
        .table{
            border:none;
        }
        </style>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">price</th>
          </tr>
        </thead>
        <tbody>
            @foreach($products as $item)
          <tr>
            <th scope="row">{{ $item['id'] }}</th>
             <td><a href="detail/{{$item['id']}}"  >  {{$item['name']}} </a></td>
            <td><img src="{{ asset('storage/images/'.$item['photo']) }}"class="img" width="100px" height="150px" ></td>
          <td><a href="deatils/{{ $item['id'] }}" > {{$item['price']}} </a></td>
          </tr>
         
            @endforeach
         
        </tbody>
      </table>
</div>
@endsection