<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bank;
use App\Models\BankDeposit;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class BankController extends Controller
{
    public function bank_list(){
        return Bank::all();
    }



    public function add_bank(Request $request)
    {
    
        $now = Carbon::now()->toDayDateTimeString();

        if ($request->method()=="POST")
		{
			$data = $request->input();

            $account_chart =	Bank::create([
                'bank_name' => $data['bank_name'],
                'bank_branch' => $data['bank_branch'],
                'account_number' => $data['account_number']
            ]);
    
    
            $response = [
                'title' => "Thanks",
                'message' => "Created Successfully",
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

    
    public function bank_deposit(Request $request)
    {
    
        $now = Carbon::now()->toDayDateTimeString();

        if ($request->method()=="POST")
		{
			$data = $request->input();

            $user_id = Auth::user()->id;

            $account_chart =	BankDeposit::create([
                'bank_id' => $data['bank_id'],
                'amount' => $data['amount'],
                'deposit_slip_number' => $data['deposit_slip_number'],
                'deposit_date' => $data['deposit_date'],
                'user_id' => $user_id 
            ]);
    
    
            $response = [
                'title' => "Thanks",
                'message' => "Created Successfully",
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
        return BankDeposit::with('bank')->get();
    }



}
