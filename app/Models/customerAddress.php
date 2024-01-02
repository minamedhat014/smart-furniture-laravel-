<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class customerAddress extends Model
{
    use HasFactory;
    protected $table ='customer_addresses';
    protected $guarded =[];

    public function customerAddress ():BelongsTo
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function city ():BelongsTo
    {
        return $this->belongsTo(city::class,'city_id');
    }
}
