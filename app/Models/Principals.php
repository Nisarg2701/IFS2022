<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Principals extends Model
{
    use HasFactory;
    protected $table = "principals";
    protected $primaryKey = "principal_id";
}
