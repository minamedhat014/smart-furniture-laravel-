<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Activitity extends Model
{
    use HasFactory,LogsActivity;

protected $table ='activitities';
protected $fillable =[
'name','type'
];

public function getActivitylogOptions(): LogOptions
{
    return LogOptions::defaults()
    ->logOnly(['*']);
    // Chain fluent methods for configuration options
}


}
