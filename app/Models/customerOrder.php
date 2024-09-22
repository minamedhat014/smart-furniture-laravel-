<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class customerOrder extends Model  implements HasMedia
{
    use HasFactory,LogsActivity,InteractsWithMedia;
    protected $table = 'customer_orders';
    protected $guarded =['id'];


    public function store () :BelongsTo{
        return $this->belongsTo(showRoom::class,'branch_id');
    }

    public function address () :BelongsTo{
        return $this->belongsTo(customerAddress::class,'delivery_address_id');
    }

    public function customer () :BelongsTo{
        return $this->belongsTo(Customer::class,'customer_id');
    }
    public function orderDetails () :HasMany{
        return $this->HasMany(OrderDetail::class,'order_id');
    }



    public function trace () :HasMany{
        return $this->HasMany(OrderTrace::class,'order_id');
    }

    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['status_id']);
        // Chain fluent methods for configuration options
    }

    public function registerMediaCollections(): void
    {
            $this
            ->addMediaCollection('orders')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width(100)
                    ->height(100);
            });
    
    }

    public function updates()
    {
        return $this->morphMany(UpdateRecordDate::class, 'updateable');
    }

  

}
