<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OfferDetail extends Model
{
    use HasFactory;
    protected $table='offer_details';
    protected $guarded =[];

    

    public function productItem(): BelongsTo
    {
        return $this->BelongsTo(productDetail::class,'item_id');
    }

    public function offer(): BelongsTo
    {
        return $this->BelongsTo(offer::class,'offer_id');
    }
}
