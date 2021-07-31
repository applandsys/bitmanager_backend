<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class UserController extends Controller
{
    public function userDetail(){
        return $user = Auth::user();
    }


    public function add_user(Request $request){

        if ($request->method()=="POST")
		{


            $input = $request->all();

            $photo = "no Photo";

              if(!empty($input['image'])){    
                $photo  = time().'-'.$request->image->getClientOriginalName(); 
                $request->image->move(public_path('user_photo'),  $photo );
              }else{
                    unset($input['image']);
              }

            $user_create =	User::create([
                'name' => $input['user_fullname'],
                'email' => $input['user_email'],
                'role' => $input['user_role'],
                'contact_number' =>  $input['user_contact_number'],
                'password' => Hash::make($input['user_password']),
                'user_photo' => $photo 
            ]);

            $response = [
                'title' => "Thanks",
                'message' => "User Created Successfully",
                'status' =>'success'
            ];
    
            return response($response, 201);
        }else{
            $response = [
                'title' => "Sorry",
                'message' => "You are not Allowed",
                'status' =>'failed'
            ];
    
            return response($response, 501); 
        }


    }


   
}
