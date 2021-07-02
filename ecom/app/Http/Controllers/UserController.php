<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
    function customers()
    {
        $data=  DB::select('select * from users');

       return view('admin.customers',['users'=>$data]);
    }
    function login(Request $req){
    $admin= Admin::where(['email'=>$req->email])->first();
        if(!$admin || !Hash::check($req->password,$admin->password))
        {
            return redirect('adminlogin')->with('message', 'incorrect password or username ');
        }
        else{
            $req->session()->put('admin',$admin);
            return redirect('customerorders')->with('message', 'logged in');
           
        }
    }
    function ulogin(Request $req)
    {
        $user= User::where(['email'=>$req->email])->first();
        if(!$user || !Hash::check($req->password,$user->password))
        {
            return redirect('/')->with('message', 'incorrect password or username ');
        }
        else{
            $req->session()->put('user',$user);
            return redirect('/')->with('message', 'logged in');
           
        }
    }
    function adminregister(Request $req){
        $user= new User;
    
       $user->name=$req->name;
       $user->email=$req->email;
       $user->password=Hash::make($req->name);
       $user->save();
       return redirect('login')->with('message', 'user added!');
    }
   

}
