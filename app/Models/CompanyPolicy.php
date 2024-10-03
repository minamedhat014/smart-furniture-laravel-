<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class CompanyPolicy extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $table ="company_policies";
    protected $guarded =['id'];


    public function  company(){
        return $this->belongsTo(Company::class,'company_id');
       }

       public function  department(){
        return $this->belongsTo(Department::class,'department_id');
       }
       

       
    public function registerMediaCollections(): void
    {
            $this
            ->addMediaCollection('companyPolicy');
           
    }


}
