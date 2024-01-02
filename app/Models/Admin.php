<?php

namespace App\Models;


use Spatie\MediaLibrary\HasMedia;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Models\Role;

class Admin extends Authenticatable implements HasMedia
{
    use HasFactory, Notifiable;
    use HasRoles;
    use InteractsWithMedia;
    
  

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
