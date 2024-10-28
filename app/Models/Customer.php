<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Customer extends Model
{
    use HasFactory;



    use LogsActivity;
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }

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

   
    public function phone(): HasMany
    {
        return $this->hasMany(CustomerPhone::class,'customer_id');
    }

   }
