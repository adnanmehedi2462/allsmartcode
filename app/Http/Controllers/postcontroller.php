<?php

namespace App\Http\Controllers;
use App\post;
use Illuminate\Http\Request;
 use App\Http\Controllers\Redirect;

class postcontroller extends Controller
{
    public function store(Request $request){

      $validatedData = $request->validate([
        'title' => 'required|unique:posts|max:255',
        'tag' => 'required',
        'discription' => 'required',

    ]);
  $post = new post;
  $post->title = $request->title;
  $post->tag = $request->tag;
  $post->discription = $request->discription;
  $post->save();

  if($post->save()){
$notification = array(
    'message' => 'Post created successfully!',
    'alert-type' => 'success'
);

return Redirect()->route('home')->with($notification);

  }
else{
     

     return Redirect()->back();


    }
}


public function all_post(){


   $post=post::orderby('id','DESC')->get();
   return view('all_post')->with(array('post' =>$post ));



}
public function delete_post($id){

     
$post=post::find($id);
$delete=$post->delete();
if($delete){
$notification = array(
    'message' => 'Post delete successfully!',
    'alert-type' => 'success'
);

return Redirect()->route('home')->with($notification);

  }
else{
     

     return Redirect()->back();


    }

}
}
//       $password=Auth::user()->password;
//       $old_pass=$request->old_pass;
//       if (Hash::check($old_pass,$password)) {
//    $user=user::find(Auth::id());

// $user->password=Hash::make($request->password);
// $user->save();
// Auth::logout();
//   if($user->save()){
// $notification = array(
//     'message' => 'your password change successfully!',
//     'alert-type' => 'success'
// );

// return Redirect()->route('login')->with($notification);

//   }




// }else{

//  $notification = array(
//     'message' => 'your password not match!',
//     'alert-type' => 'error'
// );
// return Redirect()->back()->with($notification);



// }
