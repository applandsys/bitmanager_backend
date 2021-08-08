<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class BankDeposit extends Model
{
    use HasFactory;
    protected $fillable = ['bank_id','amount','deposit_slip_number','deposit_date','user_id'];


    public function bank(){
        return $this->belongsTo(Bank::class,'bank_id');
    }
}
