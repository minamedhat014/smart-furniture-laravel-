<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Discount extends Model
{
    use HasFactory;



    use LogsActivity;
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }

    protected $table='discounts';
    protected $guarded =['id'];
    
    public function discountable()
    {
        return $this->morphTo();
    }

    public function offer ():BelongsTo
    {
        return $this->belongsTo(offer::class,'offer_id');
    }

    public function price():BelongsTo
    {
        return $this->belongsTo(offer::class,'offer_id');
    }
}
