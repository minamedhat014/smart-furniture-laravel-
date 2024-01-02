<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activitity extends Model
{
    use HasFactory;

protected $table ='activitities';
protected $fillable =[
'name','type'
];
}
