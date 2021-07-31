<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryBit extends Controller
{
    public function bit_category(){
        return BitCategory::all();
    }
}
