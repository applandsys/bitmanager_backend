<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CooperativeBook extends Model
{
    use HasFactory;
    protected $fillable = ['book_number','member_name','member_contact','member_photo','nid'];
}
