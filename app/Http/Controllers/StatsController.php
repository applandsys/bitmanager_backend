<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BitCollect;
use App\Models\TransportCollection;
use App\Models\BankDeposit;

class StatsController extends Controller
{
    public function totalStats(){
        $total_bit_collection = BitCollect::sum('fare');
        $total_transport_collection = TransportCollection::sum('amount');
        $total_expense = TransportCollection::sum('amount');
        $total_bankdeposit = BankDeposit::sum('amount');

        $response = [
                    'total_bit_collection'=> $total_bit_collection,
                    'total_transport_collection'=> $total_transport_collection,
                    'total_expense'=> $total_transport_collection,
                    'total_bankdeposit'=> $total_bankdeposit
                ];

        return response($response,201);
    }
}
