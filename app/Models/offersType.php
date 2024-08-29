<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class offersType extends Model
{
    use HasFactory;
    protected $table='offers_type';
    protected $guarded =['id'];

    public function offer(): BelongsTo
    {
        return $this->BelongsTo(offer::class,'type_id');
    }
}
