<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerPhone extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table='customer_phones';
    protected $guarded =[''];


    public function customerPhone(): BelongsTo
    {
        return $this->BelongsTo(Customer::class,'customer_id');
    }
}
