<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CooperativeBook;
use App\Models\CooperativeDeposit;
use App\Models\CooperativeWithdraw;
use App\Models\CorporateLoan;

class Cooperative extends Controller
{
    
    public function add_book(Request $request){
        
        if ($request->method()=="POST")
        {
            $input = $request->all();

            $photo = "no Photo";

              if(!empty($input['image'])){    
                $photo  = time().'-'.$request->image->getClientOriginalName(); 
                $request->image->move(public_path('cooperative_image'),  $photo );
              }else{
                    unset($input['image']);
              }

            $book_create =	CooperativeBook::create([
                'book_number' => $input['book_number'] ,
                'member_name' =>$input['member_name'],
                'member_contact' => $input['member_contact'],
                'nid' => $input['nid'],
                'member_photo' =>  $photo
            ]);

            $response = [
                'title' => "Thanks",
                'message' => "Book Created Successfully",
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
        
        return response($response, 201);

    }


    public function book_list(){
        return CooperativeBook::all();
    }

    
// Book Search //
public function cooperative_book_Search(Request $request){
        
    if ($request->method()=="POST")
    {
        $data = $request->input();
        $member_name = $data['member_name'];

        return CooperativeBook::where('book_number',$member_name)->orWhere('member_name',$member_name)->get();

        
    }

}

public function book_detail(Request $request){
        
    if ($request->method()=="POST")
    {
        $data = $request->input();
        $book_id = $data['book_id'];

        return CooperativeBook::where('id',$book_id)->get();

        
    }

}


    public function add_deposit(Request $request){


        if ($request->method()=="POST")
		{
			$data = $request->input();

            $bit_collection =	CooperativeDeposit::create([
                'user_id' => 1,
                'book_number_id' =>  $data['book_number'],
                'amount' =>  $data['amount'] 
            ]);
    
    
            $response = [
                'title' => "Thanks",
                'message' => "Deposited Successfully",
                'status' =>'success'
            ];
    

        }else{
            $response = [
                'title' => "Sorry",
                'message' => "Unauthorized",
                'status' =>'unsuccess'
            ];
    
        }    

        
        return response($response, 201);


    }

    


    public function withdraw(Request $request){


        if ($request->method()=="POST")
		{
			$data = $request->input();

            $bit_collection =	CooperativeWithdraw::create([
                'user_id' => 1,
                'book_number_id' =>  $data['book_number'],
                'amount' =>  $data['amount'] 
            ]);
    
    
            $response = [
                'title' => "Thanks",
                'message' => "Withdraw Successfully",
                'status' =>'success'
            ];
    

        }else{
            $response = [
                'title' => "Sorry",
                'message' => "Unauthorized",
                'status' =>'unsuccess'
            ];
    
        }    

        
        return response($response, 201);


    }

    
    public function loan(Request $request){


        if ($request->method()=="POST")
		{
			$data = $request->input();

            $bit_collection =	CorporateLoan::create([
                'user_id' => 1,
                'loan_id' => $data['loan_number'],
                'name' =>  $data['name'],
                'amount' =>  $data['amount'] 
            ]);
    
    
            $response = [
                'title' => "Thanks",
                'message' => "Loan Given Successfully",
                'status' =>'success'
            ];
    

        }else{
            $response = [
                'title' => "Sorry",
                'message' => "Unauthorized",
                'status' =>'unsuccess'
            ];
    
        }    

        
        return response($response, 201);


    }


    public function deposit_list(){
        return CooperativeDeposit::all();
    }

    public function withdraw_list(){
        return CooperativeWithdraw::all();
    }

    public function loan_list(){
        return CorporateLoan::all();
    }




}
