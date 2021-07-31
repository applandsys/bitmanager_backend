<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BitCollect;
use Carbon\Carbon;

class BitCollection extends Controller
{

    public function insert_collection(Request $request)
    {
    
        $now = Carbon::now()->toDayDateTimeString();

        if ($request->method()=="POST")
		{
			$data = $request->input();

            $bit_collection =	BitCollect::create([
                'bit_id' => 1,
                'fare' =>  $data['fare'],
                'utility' =>  $data['utility'],
                'collection_due' =>  $data['collection_due'],
                'due' =>  $data['due'],
                'collection_date' =>   date("Y-m-d") 
            ]);
    
    
            $response = [
                'title' => "Thanks",
                'message' => "Collected Successfully",
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


    
    public function collection_list_lastdate()
    {
        return BitCollect::with('bit')->get();
    }




}
