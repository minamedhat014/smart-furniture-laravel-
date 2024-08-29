<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complaintExplantion extends Model
{
    use HasFactory;
    protected $table='complaint_explantions';
    protected $guarded =['id'];
}
