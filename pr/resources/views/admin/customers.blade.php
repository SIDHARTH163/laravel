
@extends('admin.layouts.adminmaster')
@section('content')
<div class="container customer">
    {{-- <div class="alert alert-primary" role="alert">
    view your customers here!
      </div> --}}
      <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>Hiii!</strong> You can now view your customers.    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
      <table class="table">
        <thead>
          <tr class="table-dark">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Updated At</th>
            <th scope="col">Created_at</th>
           
           
          </tr>
        </thead>
        @foreach ($users as $user)
        <tr class="table-primary">
        <td>{{ $user->id }}</td>
        <td>{{ $user->fname }}</td>
        <td>{{ $user->email }}</td>
      
        <td>{{ $user->updated_at }}</td>
        <td>{{ $user->created_at }}</td>
        
        </tr>
       
        @endforeach
      </table>
    </div>
    
@endsection
