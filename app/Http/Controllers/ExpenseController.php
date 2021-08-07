<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AccountChart;
use App\Models\ExpenseLog;
use Carbon\Carbon;

class ExpenseController extends Controller
{


    public function expense_chart(){
        return AccountChart::all();
    }

    public function addExpenseChart(Request $request)
    {
    
        $now = Carbon::now()->toDayDateTimeString();

        if ($request->method()=="POST")
		{
			$data = $request->input();

            $account_chart =	AccountChart::create([
                'account_name' => $data['account_name']
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


    

    public function add_expense(Request $request)
    {
    
        $now = Carbon::now()->toDayDateTimeString();

        if ($request->method()=="POST")
		{
			$data = $request->input();

            $account_chart =	ExpenseLog::create([
                'account_chart_id' => $data['account_chart_id'],
                'amount' => $data['amount']
            ]);
    
    
            $response = [
                'title' => "Thanks",
                'message' => "Expense Successfully",
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





}
