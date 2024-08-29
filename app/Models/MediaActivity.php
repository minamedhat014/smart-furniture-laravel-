<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaActivity extends Model
{
    use HasFactory;

    protected $table='media_activities';
    protected $guarded =['id'];
}
