<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class versionReason extends Model
{
    use HasFactory;
    protected $table ='version_reason';
    protected $guarded =['id'];
}
