<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateRecordDate extends Model
{
    use HasFactory;

    protected $table='update_record_dates';
    protected $guarded =['id'];

    
    public function updateable()
    {
        return $this->morphTo();
    }
}
