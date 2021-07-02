
@extends('admin.layouts.master')
@section('content')

<div class="container">
    @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
    <table class="table">
        <thead>
          <tr class="table-dark">
            <th scope="col">#</th>
            <th scope="col">Product Name</th>
            <th scope="col">Photo</th>
            <th scope="col">Product Price</th>
            <th scope="col">Created_at</th>
            <th scope="col">Operations</th>
          </tr>
        </thead>
        @foreach ($users as $user)
        <tr class="table-primary">
        <td>{{ $user->id }}</td>
        <td>{{ substr($user->name, 0,  20) }}</td>
        <td><img src="{{ asset('storage/images/'.$user->photo) }}"class="img" width="200px" height="150px"></td>
        <td>{{ $user->price }}</td>
        <td>{{ $user->created_at }}</td>
        <td><a href='delete/{{ $user->id }}'><button class="btn-primary">Delete</button></a>
            <a href='edit/{{ $user->id }}'><button class="btn-primary">Update</button></a>
        </td>
        </tr>
       
        @endforeach
      </table>
</div>
@endsection
