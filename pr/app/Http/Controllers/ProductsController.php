<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use Session;
class ProductsController extends Controller
{
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
    public function viewpr1(){
        $users = DB::select('select * from products Where category="Electronics" ORDER BY `id` DESC');
        return view('admin.viewproducts',['users'=>$users]);
        }
        public function viewpr2(){
            $users = DB::select('select * from products Where category="Fashion" ORDER BY `id` DESC');
            return view('admin.viewproducts1',['users'=>$users]);
            }
            public function viewpr3(){
                $users = DB::select('select * from products Where category="Coming-Soon" ORDER BY `id` DESC');
                return view('admin.viewproducts2',['users'=>$users]);
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
        public function customerorders(){
            $data1 = DB::select('select * from orders');
            return view('admin.orders',['orders'=>$data1]);
            }
    }
