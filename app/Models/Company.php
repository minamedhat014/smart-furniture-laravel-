<?php

namespace App\Models;

use App\Models\showroom;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    use LogsActivity;
    use HasFactory;
    protected $table='companies';
    protected $fillable =[
    'name',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
        ->logOnly(['*']);
        // Chain fluent methods for configuration options
    }
    

    public function store(): HasMany
    {
        return $this->hasMany(showroom::class ,'company_id');
    }

    public function users(): HasMany
    {
        return $this->hasMany(Admin::class ,'company_id');
    }


}
