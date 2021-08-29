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
                'name' =>  $data['name'],
                'rent' =>  $data['rent']
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


    public function transport_collection_daterange(Request $request)
    {
        if ($request->method()=="POST")
		{
	
            $data = $request->input();

            $date_start = $data['date_start'];
            $date_end   = $data['date_end'];
			
			$date_from = Carbon::parse( $date_start)->startOfDay();
			$date_to = Carbon::parse($date_end)->endOfDay();
			
			if( $date_start ==     $date_end){
				return TransportCollection::where('custom_date',$date_start)->get();
			}else{
				return TransportCollection::whereDate('created_at', '>=', $date_from)
											->whereDate('created_at', '<=', $date_to)->get();
			}

        }
    }
	
	//https://stackoverflow.com/questions/44158949/laravels-wherebetween-not-including-date-from/44159457
	
	
	public function transport_detail_by_id(Request $request){
		if ($request->method()=="POST")
		{
	
            $data = $request->input();

            $transport_id = $data['transport_id'];
         
            return Transport::where('id', $transport_id)->get();

        }
	}

}
