<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class productDetail extends Model implements HasMedia
{
  
    use HasFactory,InteractsWithMedia;



    protected $table='product_details';
    protected $guarded = [];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function price(): HasOne
    {
        return $this->HasOne(Price::class,'product_detail_id');
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
