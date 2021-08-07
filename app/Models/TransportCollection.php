<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransportCollection extends Model
{
    use HasFactory;
    protected $fillable = ['transport_id','amount','custom_date','vehicle_number','driver_name','license_number','contact_number'];

    public function transport(){
        return $this->belongsTo(Transport::class,'transport_id');
    }

}
