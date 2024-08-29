<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;
    protected $table="order_details";
    protected $guarded =['id'];

    public function order () :BelongsTo{
        return $this->belongsTo(customerOrder::class,'order_id');
    }

    public function productDetails () :BelongsTo{
        return $this->belongsTo(productDetail::class,'item_id');
    }


}
