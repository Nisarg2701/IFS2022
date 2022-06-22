<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    use HasFactory;
    protected $table = "inquiry";
    protected $primaryKey = "inquiry_id";

    public function getCreatedAtAttribute($value){
        return date("d-M-Y",strtotime($value));
    }
}
