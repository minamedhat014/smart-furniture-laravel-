<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class offer extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $table='offers';
    protected $guarded =['id'];

    public function typeOffer(): BelongsTo
    {
        return $this->BelongsTo(offersType::class,'type_id');
    }
    
    protected $casts =[
        'product_types' => 'array',
        ];

     
        public function getActivitylogOptions(): LogOptions
        {
            return LogOptions::defaults()
            ->logOnly(['*']);
            // Chain fluent methods for configuration options
        }
        
        public function products() :BelongsToMany
        {
            return $this->belongsToMany(Product::class,'product_offer','offer_id','product_id');
        }
       
        public function discount(): HasOne
    {
        return $this->hasOne(discount::class,'offer_id');
    }
        
}
