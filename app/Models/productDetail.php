<?php

namespace App\Models;

use App\Models\Product;
use App\Traits\FormatDate;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class productDetail extends Model implements HasMedia
{
  
    use HasFactory,InteractsWithMedia;
    use FormatDate;


    protected $table='product_details';
    protected $guarded =['id'];


    
public function getFormattedCreatedAtAttribute()
{
    return $this->formatDateOnly($this->created_at);
}


    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }


    public function price()
    {
        return $this->morphOne(price::class, 'pricable');
    }

    public function balance()
    {
        return $this->hasOne(Availableitem::class, 'item_code','item_code');
    }


    public function registerMediaCollections(): void
    {
            $this
            ->addMediaCollection('productItems')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width(100)
                    ->height(100);
            });
    
    }
    
   


}
