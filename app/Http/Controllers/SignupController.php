<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup');
    }
    public function signup(Request $request)
    {
        $user = new User();
        
            $file=$request->file('avatar');
           
            // dd($file);
            $image_name=$file->getClientOriginalName();
           
            $user->avatar=$image_name;
            
        //    dd($image_name);
        //    dd($file);


        
      
        $user->name=$request->first_name .''. $request->last_name;
     
        // $user->gender=$request->input('gender');
        $user->email=$request->email;
        // $user->password=$request->password;
        $user->password= Hash::make($request->password);
      
        // $user->is_online='0';
        $user->created_at=Carbon::now();
        
        if( $request->password==$request->input('re_password'))
        {
            // dd($user);
            $file->move('images/avatar/',$file->getClientOriginalName());
            $user->save();
        return redirect('login');
        }
        else{
            return response()->json([
                'success'=>'false',
                'message'=>'mật khẩu không khớp'
            ]);
        }       
    }
}
