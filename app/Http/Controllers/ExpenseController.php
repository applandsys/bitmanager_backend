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
			
			$account_name = $data['account_name'];
			
			$chart_exist = AccountChart::where('account_name',$account_name)->count();

			if($chart_exist==0){
				
				$account_chart =	AccountChart::create([
											'account_name' => $account_name
									]);
		
		
				$response = [
					'title' => "Thanks",
					'message' => "Created Successfully",
					'status' =>'success'
				];
    
				
			}else{
				$response = [
					'title' => "Sorry",
					'message' => "Account already Exist",
					'status' =>'failed'
				];
    
			}

            

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
                'description' => $data['description'],
                'custom_date' => $data['custom_date'],
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


    public function expense_list(){
       return ExpenseLog::whereDate('created_at', Carbon::today())->with('accountchart')->get();
    }
	
	
	
    public function expense_daterange(Request $request)
    {
        if ($request->method()=="POST")
		{
	
            $data = $request->input();

            $date_start = $data['date_start'];
            $date_end   = $data['date_end'];
			
			$date_from = Carbon::parse( $date_start)->startOfDay();
			$date_to = Carbon::parse($date_end)->endOfDay();
			
			if( $date_start ==     $date_end){
				return ExpenseLog::where('custom_date',$date_start)->get();
			}else{
				return ExpenseLog::whereDate('created_at', '>=', $date_from)
											->whereDate('created_at', '<=', $date_to)->with('accountchart')->get();
			}

        }
    }



}
