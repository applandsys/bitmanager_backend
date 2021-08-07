<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransportCollection;
use App\Models\Transport;
use Carbon\Carbon;

class TransportContoller extends Controller
{
    public function addTransportCollection(Request $request){
        $now = Carbon::now()->toDayDateTimeString();

        if ($request->method()=="POST")
		{
			$data = $request->input();

            $bit_collection =	TransportCollection::create([
                'transport_id' =>  $data['transport_id'],
                'amount' =>  $data['amount'],
                'custom_date' =>  $data['custom_date'],
                'vehicle_number' =>  $data['vehicle_number'],
                'driver_name' =>  $data['driver_name'],
                'license_number' =>  $data['license_number'],
                'contact_number' =>  $data['contact_number']
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


    public function transport(){
        return Transport::all();
    }

    public function add_transport(Request $request){

        if ($request->method()=="POST")
		{
			$data = $request->input();

            $bit_collection =	Transport::create([
                'name' =>  $data['name']
            ]);
    
    
            $response = [
                'title' => "Thanks",
                'message' => "Transport Added Successfully",
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


    public function transport_collection_detail(Request $request){
        if ($request->method()=="POST")
		{
			$data = $request->input();
            $id = $data['collection_id']; 
            return TransportCollection::where('id',$id)->with('transport')->get();
        }    
        
    }



    public function TodayTransportCollection(){
        return TransportCollection::whereDate('created_at', Carbon::today())->get();
    }

}
