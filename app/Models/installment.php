<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class installment extends Model
{
    use HasFactory;
    protected $table ='installments';
    protected $guarded =['id'];



    public function updates()
    {
        return $this->morphMany(UpdateRecordDate::class, 'updateable');
    }

}
