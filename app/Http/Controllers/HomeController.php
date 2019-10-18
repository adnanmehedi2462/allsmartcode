<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\user;
use Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function change_pass(){

   return view('change_pass');
      


    }

    public function update_pass(Request $request){
  $password=Auth::user()->password;
  $old_pass=$request->old_pass;
  if (Hash::check($old_pass,$password)) {
    $user=user::find(Auth::id());
    $user->password=Hash::make($request->password);
    $user->save();
    Auth::logout();
    if ($user->save()) {
      $notification = array(
    'message' => 'your password change successfully!',
   'alert-type' => 'success');

        return Redirect()->route('login')->with($notification);
    }
  
  }else{


   $notification = array(
    'message' => 'your password change successfully!',
   'alert-type' => 'success');

        return Redirect()->back()->with($notification);
    }



  }



    }
    


