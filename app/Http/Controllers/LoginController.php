<?php

namespace App\Http\Controllers;

use App\Key;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

session_start();
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
                Session::put('id',$log->id);
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

    public function userInfo(Request $request){
        $log=User::where('id',$request->id)->first();
            return response()->json($log);     
        
    }

    public function random_number(){
        
            return sprintf( '%04x-%04x-%04x-%04x',
                mt_rand( 0, 0xffff ),
                mt_rand( 0, 0xffff ),
                mt_rand( 0, 0x0C2f ) | 0x4000,
                mt_rand( 0, 0x3fff ) | 0x8000,
                
            );
        
       
    }

    public function generateKey(Request $request){
        //dd($request->all());
        $test=Key::where('user_id',$request->id)->first();
        if(!$test){
            $data=new Key;
            $data->user_id=$request->id;
            $data->key=$request->key;
            $data->time=$request->month;
            $save=$data->save();
            if($save){
                $notification=array(
                    'message'=>'Key Generated Successfully',
                    'alert-type'=>'success'
                );
                return redirect()->back()->with($notification);  
            } else {
                $notification=array(
                    'message'=>'Key Already Generated!',
                    'alert-type'=>'error'
                );
                return redirect()->back()->with($notification); 
            }

        }
        
        
        
    }

    public function activate(){
        return view('activate');
    }

    public function activateKey(Request $request){
        $id=Session::get('id');
        $test=Key::where('id',$id)->first();
        $log=User::where('id',$id)->first();
        if($test->key==$request->key && !$log->lisence_key){
            $log->lisence_key=$request->key;
            $log->expire_date=date('Y-m-d', strtotime('+'.$test->time.' month'));
            $log->save();
            $notification=array(
                'message'=>'Congratulations!!Your Lisence Has Been Activated',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notification); 
        } else {
            $notification=array(
                'message'=>'Wrong Activation Key or Already Activated.',
                'alert-type'=>'error'
            );
            return redirect()->back()->with($notification); 
        }
        
    }
}
