<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class offer extends Model
{
    use HasFactory;

    protected $table='offers';
    protected $guarded =[];

    public function typeOffer(): BelongsTo
    {
        return $this->BelongsTo(offersType::class,'type_id');
    }
    
    protected $casts =[
        'product_types' => 'array',
        ];

        public function updates()
        {
            return $this->morphMany(UpdateRecordDate::class, 'updateable');
        }
}
