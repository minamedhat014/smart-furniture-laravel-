<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Discount extends Model
{
    use HasFactory;


    protected $table='discounts';
    protected $guarded =['id'];
    
    public function discountable()
    {
        return $this->morphTo();
    }

    public function offer ():BelongsTo
    {
        return $this->belongsTo(offer::class,'offer_id');
    }

    public function price():BelongsTo
    {
        return $this->belongsTo(offer::class,'offer_id');
    }
}
