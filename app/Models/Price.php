<?php

namespace App\Models;

use App\Models\productDetail;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Price extends Model
{
    use HasFactory;
    use LogsActivity;
    protected $table='prices';
    protected $guarded = [];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['dealler_price', 'end_after_discount','special_discount']);
        // Chain fluent methods for configuration options
    }

    public function item (): BelongsTo
    {
        return $this->belongsTo(productDetail::class,'product_detail_id');
    }

}
