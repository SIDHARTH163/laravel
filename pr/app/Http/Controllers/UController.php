<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;

class UController extends Controller
{
    function index()
    {
        $data=  DB::select('select * from products ORDER BY `id` DESC Limit 8 ');

       return view('index',['products'=>$data]);
    }
    function pr()
    {
        $data=  DB::select('select * from products ORDER BY `id` DESC  ');

       return view('pr',['products'=>$data]);
    }
    function electronics()
    {
        $data=  DB::select('select * from products  Where category="Electronics" ORDER BY `id` DESC ');

       return view('electronics',['products'=>$data]);
    }
    function fashion()
    {
        $data=  DB::select('select * from products Where category="Fashion" ORDER BY `id` DESC');

       return view('fashion',['products'=>$data]);
    }
    function soon()
    {
        $data=  DB::select('select * from products Where category="Coming-Soon" ORDER BY `id` DESC');

       return view('comingsoon',['products'=>$data]);
    }
    function detail($id)
    {
        
        $data =Product::find($id);
        return view('detail',['product'=>$data]);
    }
    function search(Request $req)
    {
        $data= Product::
        where('name','like', '%'.$req->input('query').'%')->orWhere('category','like', '%'.$req->input('query').'%')
        ->get();
        return view('search',['products'=>$data]);
    }
    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
           $cart= new Cart;
           $cart->user_id=$req->session()->get('user')['id'];
           $cart->product_id=$req->product_id;
           $cart->save();
           return redirect('/cartlist')->with('message', 'Your item added to cart!');

        }
        else
        {
            return redirect('/login');
        }
    }
    static function cartItem()
    {
     $userId=Session::get('user')['id'];
     return Cart::where('user_id',$userId)->count();
    }
    function cartList()
    {
        $userId=Session::get('user')['id'];
       $products= DB::table('cart')
        ->join('products','cart.product_id','=','products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();

        return view('cartlist',['products'=>$products]);
    }
    function removeCart($id)
    {
        Cart::destroy($id);
       
        return redirect('/index')->with('danger', 'your cart item has been removed!');
    }
    function orderNow()
    {
        $userId=Session::get('user')['id'];
        $total= $products= DB::table('cart')
         ->join('products','cart.product_id','=','products.id')
         ->where('cart.user_id',$userId)
         ->sum('products.price');
 
         return view('ordernow',['total'=>$total]);
    }
    function orderPlace(Request $req)
    {
        $userId=Session::get('user')['id'];
         $allCart= Cart::where('user_id',$userId)->get();
         foreach($allCart as $cart)
         {
             $order= new Order;
             $order->product_id=$cart['product_id'];
             $order->user_id=$cart['user_id'];
             $order->status="pending";
             $order->payment_method=$req->payment;
             $order->payment_status="pending";
             $order->address=$req->address;
             $order->save();
             Cart::where('user_id',$userId)->delete(); 
         }
         $req->input();
         return redirect('/index')->with('message', 'Contratulation your order has been placed successfully!');
    }
    function myOrders()
    {
        $userId=Session::get('user')['id'];
        $orders= DB::table('orders')
         ->join('products','orders.product_id','=','products.id')
         ->where('orders.user_id',$userId)
         ->get();
 
         return view('myorders',['orders'=>$orders]);
    }
}
