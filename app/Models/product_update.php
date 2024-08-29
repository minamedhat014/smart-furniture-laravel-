<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\Image\Manipulations;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class product_update extends Model implements HasMedia
{

    use HasFactory,InteractsWithMedia;
    protected  $table ='product_updates';
    protected $guarded =['id'];


    protected $casts =[
        'items_code' => 'array',
        ];
    
    public function products(): BelongsTo
    {
        return $this->belongsTo(product::class,'product_id');
    }
    
    public function reasons(): BelongsTo
    {
        return $this->belongsTo(versionReason::class,'reason_id');
    }

    public function registerMediaCollections(): void
    {
            $this
            ->addMediaCollection('versions')
            ->registerMediaConversions(function (Media $media) {
                $this
                    ->addMediaConversion('thumb')
                    ->width(100)
                    ->height(100);
            });
}
}