<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerTitles extends Model
{
    use HasFactory;
    protected $table='customer_titles';

    protected $fillable=[
        'name'
    ];
}
