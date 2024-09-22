<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class OrderTrace extends Model
{
    use HasFactory;

    protected $guarded =['id'];
    protected $table ='order_traces';


   
    public function order () :BelongsTo{
        return $this->belongsTo(customerOrder::class,'order_id');
    }

}
