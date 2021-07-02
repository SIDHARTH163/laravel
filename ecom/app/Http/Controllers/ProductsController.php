<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Session;
class ProductsController extends Controller
{
    function index()
    {
        $data=  DB::select('select * from products');

       return view('welcome',['products'=>$data]);
    }
    function search(Request $req)
    {
        $data= Product::
        where('name', 'like', '%'.$req->input('query').'%')
        ->get();
        return view('search',['products'=>$data]);
    }
    function detail($id)
    {
        $data =Product::find($id);
        return view('detail',['product'=>$data]);
    }
    function addToCart(Request $req)
    {
        if($req->session()->has('user'))
        {
           $cart= new Cart;
           $cart->user_id=$req->session()->get('user')['id'];
           $cart->product_id=$req->product_id;
           $cart->save();
           return redirect('/')->with('message', 'Your item added to cart!');

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
       
        return redirect('/')->with('warning', 'your cart item hasbeen removed!');
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
         return redirect('/')->with('message', 'Contratulation your order placed successfully!');
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
    // usercontroller ends there
    // admin controllers 

    function view(){
        return view('admin.products');
        // return "nice";

    }
    public function insert(Request $request)
    {
        

        
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'desc' => 'required',
            'file' => 'required',
            'price'=>'required',
            'features'=>'required',
            'status'=>'required',
        ]);

        // ensure the request has a file before we attempt anything else.
        if ($request->hasFile('file')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            // Save the file locally in the storage/public/ folder under a new folder named /product
            $request->file->store('images', 'public');

            // Store the record, using the new file hashname which will be it's new filename identity.
            $product = new Product([
                "name" => $request->get('name'),
                "category" => $request->get('category'),
                "desc" => $request->get('desc'),
                "price" => $request->get('price'),
                "features" => $request->get('features'),
                "status" => $request->get('status'),
                "photo" => $request->file->hashName()
            ]);
            $product->save(); // Finally, save the record.
        }

        return redirect('addproducts')->with('message', 'product added!');
    }
    public function show(){
        $users = DB::select('select * from products');
        return view('admin.viewallproducts',['users'=>$users]);
        }
        public function customerorders(){
            $data1 = DB::select('select * from orders');
            return view('admin.orders',['orders'=>$data1]);
            }

        public function destroy($id){
            DB::delete('delete from products Where id=?',[$id]);
            return redirect('viewproducts')->with('message', 'product delted!');
        }
        // update
        public function showData($id){
            $data=Product::find($id);
            return view('admin.edit',['data'=>$data]);
        }
        public function update(Request $req){
$data=Product::find($req->id);
$data->name=$req->name;
$data->price=$req->price;
$data->features=$req->features;
$data->desc=$req->desc;

$data->status=$req->status;
$data->save();
return redirect('viewproducts')->with('message', 'product updated!');
        }
}
      

    

