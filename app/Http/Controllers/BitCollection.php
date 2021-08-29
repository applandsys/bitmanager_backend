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
        return BitCollect::with('bit')->whereDay('created_at', now()->day)->get();
    }


    public function bit_collection_daterange(Request $request)
    {
        if ($request->method()=="POST")
		{
	
            $data = $request->input();

            $date_start = $data['date_start'];
            $date_end   = $data['date_end'];
            return BitCollect::with('bit')->whereBetween('created_at',[$date_start,$date_end])->get();
        }
    }



}
