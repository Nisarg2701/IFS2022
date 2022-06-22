<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecruitmentInfo extends Model
{
    use HasFactory;
    protected $table = "recruitment_info";
    protected $primaryKey = "recruitment_id";
}
