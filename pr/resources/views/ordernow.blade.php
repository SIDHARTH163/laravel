@extends('layouts.master')
@section('content')
<div class="container-fluid  ">
<div class=" container custom-product">
  
       <table class="table">
        
           <tbody>
             <tr>
               <td>Amount</td>
             <td>$ {{$total}}</td>
             </tr>
             <tr>
               <td>Tax</td>
               <td>$ 0</td>
             </tr>
             <tr>
               <td>Delivery </td>
               <td>$ 10</td>
             </tr>
             <tr>
               <td>Total Amount</td>
             <td>$ {{$total+10}}</td>
             </tr>
           </tbody>
         </table>
         
           <form action="/orderplace" method="POST" >
             @csrf
               <div class="form-group">
                 <textarea name="address" placeholder="enter your address" class="form-control" ></textarea>
               </div>
               <div class="form-group">
                 <label for="pwd">Payment Method</label> <br> <br>
                
                 <input type="radio" value="cash" name="payment"> <span>Payment on Delivery</span> <br> <br>

               </div>
               <button type="submit" class="btn btn-primary">Order Now</button>
             </form>
         </div>
    </div>
</div>
</div>
@endsection