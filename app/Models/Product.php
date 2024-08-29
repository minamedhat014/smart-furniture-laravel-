<?php

namespace App\Models;

use App\Traits\FormatDate;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Product extends Model implements HasMedia
{
    use HasFactory,InteractsWithMedia,HasFactory;
    use LogsActivity;
    use FormatDate;

protected $table='products';
protected $guarded =['id'];


public function getFormattedCreatedAtAttribute()
{
    return $this->formatDateOnly($this->created_at);
}

public function getActivitylogOptions(): LogOptions
{
    return LogOptions::defaults()
    ->logOnly(['*']);
    // Chain fluent methods for configuration options
}


    public function items(): HasMany
    {
        return $this->HasMany(productDetail::class,'product_id');
    }
    


    public function type(): BelongsTo
    {
        return $this->belongsTo(productType::class,'type_id');
    }
    

    public function source(): BelongsTo
    {
        return $this->belongsTo(productSource::class,'source_id');
    }
    



    public function registerMediaCollections(): void
    {
            $this
            ->addMediaCollection('products')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width(100)
                    ->height(100);
            });
    
    }

    public function materials()
    {
        return $this->belongsToMany(Material::class,'product_material','product_id','material_id');
    }
   
    public function offers()
    {
        return $this->belongsToMany(Offer::class, 'product_offer', 'product_id', 'offer_id');
    }
   

}
