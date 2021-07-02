<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Admin;
// use Session;


class UserController extends Controller
{
function index(Request $req){
   
    $user= Admin::where(['email'=>$req->email])->first();
    if(!$user || !Hash::check($req->password,$user->password))
    {
        return redirect('admin')->with('message', 'incorrect password or username ');
    }
    else{
        $req->session()->put('user',$user);
        return redirect('addproducts')->with('message', ' logged in successfully !. Welcome to the dashboard !.Here you can manage the webiste ');
    }
}
function adminsignup(Request $req){
    $user= new Admin;

   $user->fname=$req->fname;
   $user->email=$req->email;
   $user->password=Hash::make($req->name);
   $user->save();
   return redirect('admin')->with('message', 'user added!');
}
function ulogin(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return redirect('/login')->with('danger', 'incorrect password or username ');
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/index')->with('message', 'logged in');
           
        }
    }
    function usersignup(Request $req){
        $user= new user;
    
       $user->fname=$req->fname;
       $user->email=$req->email;
       $user->password=Hash::make($req->name);
       $user->save();
       return redirect('login')->with('message', 'user added!');
    }
    function customers()
    {
        $data=  DB::select('select * from users');

       return view('admin.customers',['users'=>$data]);
    }
}

