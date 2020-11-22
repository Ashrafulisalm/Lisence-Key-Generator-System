<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function register(){
        return view('register');
    }

    public function registerUser(Request $request){
        try{
            $user=new User;
            $user->f_name=$request->f_name;
            $user->l_name=$request->l_name;
            $user->name_of_org=$request->name_of_org;
            $user->email=$request->email;
            $user->phone=$request->phone;
            $user->city=$request->city;
            $user->street=$request->street;
            $user->password=Hash::make($request->password);
            $res=$user->save();
            if($res){
                $notification=array(
                    'message'=>'Register Successfully',
                    'alert-type'=>'success'
                );
                return redirect('/login')->with($notification);
            } else {
                return redirect()->back();
            }
        } catch(exception $e){
            echo "Something Went Wrong!";
        }
        
    }

    public function loginUser(Request $request){
        try{
            $log=User::where('phone',$request->phone)->first();
            if($log && Hash::check($request->password, $log->password)){
                $notification=array(
                    'message'=>'Logged In Successfully.',
                    'alert-type'=>'success'
                );
                return redirect('/home')->with($notification);
            } else {
                $notification=array(
                    'message'=>'Incorrect Username or Password',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification);
            }
        } catch(exception $e){
            echo "Something Went Wrong!";
        }
        
    }

    public function home(){
        return view('home');
    }
}
