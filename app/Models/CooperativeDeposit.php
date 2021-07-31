<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CooperativeDeposit extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','book_number_id','amount'];
}
