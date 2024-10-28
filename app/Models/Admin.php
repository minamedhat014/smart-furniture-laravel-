<?php

namespace App\Models;


use Spatie\MediaLibrary\HasMedia;
use Spatie\Activitylog\LogOptions;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable;
    use HasRoles;
    use InteractsWithMedia;
    use LogsActivity;
    
    
  

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard ="admin";

    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'company_id',
        'phone',

    ];

    public function getActivitylogOptions(): LogOptions
{
    return LogOptions::defaults()
    ->logOnly(['*']);
    // Chain fluent methods for configuration options
}


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    

    public function registerMediaCollections(): void
{
    $this
        ->addMediaCollection('profile')
        ->singleFile();

        $this
        ->addMediaCollection('profile')
        ->registerMediaConversions(function (Media $media) {
            $this
                ->addMediaConversion('thumb')
                ->width(100)
                ->height(100);
        });

}

   public function  company(){
    return $this->belongsTo(Company::class,'company_id');
   }
   
  
}
