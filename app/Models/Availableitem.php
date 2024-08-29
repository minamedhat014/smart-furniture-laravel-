<?php

namespace App\Models;

use App\Traits\FormatDate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Availableitem extends Model
{
    use HasFactory;
    use FormatDate;

    protected $table='Available_items';
    protected $guarded =['id'];

    
public function getFormattedCreatedAtAttribute()
{
    return $this->formatDateOnly($this->created_at);
}
    
   
}
