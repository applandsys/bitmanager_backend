<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bit extends Model
{
    use HasFactory;
    protected $fillable = ['bit_name','bit_category','bit_location','bit_owner','bit_contact_number','slug','owner_photo'];
}
