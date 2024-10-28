<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class customerAddress extends Model
{
    use HasFactory;

    use LogsActivity;
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }

    
    protected $table ='customer_addresses';
    protected $guarded =['id'];

    public function customerAddress ():BelongsTo
    {
        return $this->belongsTo(Customer::class,'customer_id');
    }


}
