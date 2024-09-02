<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;

    protected $table ='customers';
    protected $guarded =['id'];

    
    public function stores(): BelongsToMany
    {
        return $this->BelongsToMany(showRoom::class,'customer_stores','customer_id','store_id');
    }

    public function address(): HasMany
    {
        return $this->hasMany(customerAddress::class,'customer_id');
    }

    public function appointment()
    {
        return $this->morphOne(price::class, 'appointable');
    }

    public function phone(): HasMany
    {
        return $this->hasMany(CustomerPhone::class,'customer_id');
    }

   }
