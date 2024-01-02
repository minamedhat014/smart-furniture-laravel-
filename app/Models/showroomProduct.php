<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class showroomProduct extends Model
{
    use HasFactory;

    protected $table='showroom_products';
    protected $guarded =[];

    
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class,'product_id');
    }

    public function showroom(): BelongsTo
    {
        return $this->belongsTo(showRoom::class,'showRoom_id');
    }

}
