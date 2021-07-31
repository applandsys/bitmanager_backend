<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BitCollect extends Model
{
    use HasFactory;
    protected $table = "bit_collections";
    protected $fillable = ['bit_id','fare','utility','collection_due','due','collection_date'];

    public function bit(){
        return $this->belongsTo(Bit::class);
    }


}



