<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseLog extends Model
{
    use HasFactory;
    protected $fillable = ['account_chart_id','description','custom_date','amount'];

    public function accountchart(){
        return $this->belongsTo(AccountChart::class,'account_chart_id');
    }


}
