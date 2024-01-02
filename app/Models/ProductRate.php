<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductRate extends Model
{
    use HasFactory;
    protected  $table ='product_reviews';
    protected $guarded = [];

    public function products(): BelongsTo
    {
        return $this->belongsTo(product::class,'product_id');
    }

}
