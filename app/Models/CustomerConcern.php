<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerConcern extends Model
{
    use HasFactory;

    protected $table='customer_concern';
    protected $fillble=['name'];
}
