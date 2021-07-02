@extends('admin.layouts.adminmaster')
@section('content')
<style>
  
  
  </style>
<div class="container top tr">
    @if(session()->has('message'))
    <div class="alert alert-primary">
        {{ session()->get('message') }}
    </div>
   
  @endif
  <form class="addpr " action="insert" method="Post" enctype="multipart/form-data">
    @csrf
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
       
      </div>
      <div class="mb-3">
        <label for="inputState" class="form-label">Category</label>
  <select id="category" name="category" class="form-select">
    <option selected>Choose...</option>
    <option>Electronics</option>
    <option>Fashion</option>
    <option>Coming-Soon</option>
  </select>
      </div>
      <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Product Price</label>
          <input type="text" class="form-control" name="price" id="exampleInputPassword1">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Product Desc</label>
          <textarea class="form-control" name="desc" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Product Features</label>
          <textarea class="form-control" name="features" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Image</label>
          <input type="file"  name ="file"class="form-control-file" id="exampleFormControlFile1">
          
        </div>
        <div class="mb-3">
          <label for="inputState" class="form-label">Status</label>
  <select id="status" name="status" class="form-select">
    <option selected>Choose...</option>
    <option>Available</option>
    <option>Not-Available</option>
    <option>Comming-Soon</option>
  </select>
        </div>
      
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
     
</div>
@endsection