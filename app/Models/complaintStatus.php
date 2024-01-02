<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complaintStatus extends Model
{
    use HasFactory;
    protected $table='complaint_statuses';
    protected $fillable=['name'];
}
