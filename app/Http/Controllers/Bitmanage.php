<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bit;
use App\Models\BitCategory;

class Bitmanage extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Bit::all();
    }


    public function bit_category(){
        return BitCategory::all();
    }

    public function testupload(Request $request)
    {
        $input = $request->all();

        $input['full_name'];

          if(!empty($input['image'])){    
                  $input['image'] = time().'-'.$request->image->getClientOriginalName();  
                  $request->image->move(public_path('images'), $input['image']);
           }else{
                  unset($input['image']);
           }
    }

// BitSearch //
    public function bitSearch(Request $request){
        
        if ($request->method()=="POST")
		{
			$data = $request->input();
			$bit_name = $data['bit_name'];

            return Bit::where('bit_name',$bit_name)->get();
			
        }

    }

// BitSearch //
    public function bit_detail(Request $request){
        
        if ($request->method()=="POST")
		{
			$data = $request->input();
			$bit_id = $data['bit_id'];

            return Bit::where('id',$bit_id)->get();

			
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */ 

    
    public function add_bit_category(Request $request)
    {

        if ($request->method()=="POST")
		{

            $input = $request->all();
			$category_name =  $input['category_name'];
			
			$category_count = BitCategory::where('category_name',$category_name)->count();

			if($category_count==0){
				$category_create =	BitCategory::create([
													'category_name' => $input['category_name'] ,
													'fare' => $input['fare'] ,
													'utility' =>$input['utility']
												]);

				$response = [
					'title' => "Thanks",
					'message' => "Bit Category Created Successfully",
					'status' =>'success'
				];
		
				return response($response, 201);
					
			}else{
				$response = [
					'title' => "sorry",
					'message' => "Bit Category Already Exist need Different Name",
					'status' =>'failed'
				];
		
				return response($response, 202);
			}
            
        }else{
            $response = [
                'title' => "Sorry",
                'message' => "You are not Allowed",
                'status' =>'failed'
            ];
    
            return response($response, 501); 
        }
    
    }

    public function bit_category_detail(Request $request){
        
        if ($request->method()=="POST")
		{
			$data = $request->input();
			$category_id = $data['category_id'];

            return BitCategory::where('id',$category_id)->get();

        }

    }

    public function create(Request $request)
    {

        if ($request->method()=="POST")
		{

            $input = $request->all();

            $bit_name =  $input['bit_name'];
            
           $bit_count  = Bit::where('bit_name',$bit_name)->count();

            if($bit_count >= 1){
                $response = [
                    'title' => "Sorry",
                    'message' => "Bit Name Already Exist",
                    'status' =>'failed'
                ];
            }else{
                $owner_photo = "no Photo";

                if(!empty($input['image'])){    
                  $owner_photo  = time().'-'.$request->image->getClientOriginalName(); 
                  $request->image->move(public_path('bit_images'),  $owner_photo );
                }else{
                      unset($input['image']);
                }
  
              $bit_create =	Bit::create([
                  'bit_name' => $input['bit_name'] ,
                  'bit_category' => $input['bit_category'] ,
                  'bit_location' =>$input['bit_location'],
                  'bit_owner' => $input['bit_owner'],
                  'owner_photo' =>   $owner_photo,
                  'bit_contact_number' =>$input['bit_contact_number'],
                  'slug' => "0",
              ]);
  
              $response = [
                  'title' => "Thanks",
                  'message' => "Bit Created Successfully",
                  'status' =>'success'
              ];


            }

          
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


    public function bit_exist(Request $request){
        if ($request->method()=="POST")
		{
			$data = $request->input();
			$bit_name = $data['bit_name'];

            $bit_info = Bit::where('bit_name',$bit_name)->get();
			
			if($bit_info->count()==0){
				 $response = [
						'title' => "Sorry",
						'bit_count' => 0,
						'message' => "No Bit Found",
						'status' =>'failed'
					];
			}else{
				 $bit_category =  BitCategory::where('id', $bit_info[0]->bit_category)->get();
				
				 $response = [
						'title' => "Thanks",
						'bit_count' => $bit_info->count(),
						'message' => "Bit Exist",
						'bit_category' =>  $bit_category ,
						'status' =>'success'
					];;
			}
           
    
            return response($response, 201);

        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
