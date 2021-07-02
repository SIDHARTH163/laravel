@extends('admin.layouts.adminmaster')
@section('content')

<div class="container top tr">
    
       <form class="addpr " action="/edit" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" value="{{ $data['id'] }}">
        <label for="fname">First Name</label>
        <input type="text" id="fname" name="name" value="{{ $data['name'] }}" placeholder="Your name..">
    
        <label for="lname">Price</label>
        <input type="text" id="lname" name="price" value="{{ $data['price'] }}" placeholder="Your last name..">
    
        <label for="staus">Status</label>
        <select id="Status" name="status">
          <option value="Available">Available</option>
          <option value="Not Avalable">Not Abailable</option>
          <option value="Coming Soon">Coming Soon</option>
        </select>
        <label for="staus">Description</label>
        <textarea name="desc">Some text...</textarea>
        <label for="staus">Features</label>
        <textarea name="features">Some text...</textarea>
        
        <button type="submit" name="submit" class="btn btn-primary">update</button>
      </form>
    </div>
</div>
@endsection