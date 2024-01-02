<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dropdownLists extends Model
{
    use HasFactory;
    protected $table = 'dropdown_lists';
    protected $fillable=['name','model_namespace'];
}
