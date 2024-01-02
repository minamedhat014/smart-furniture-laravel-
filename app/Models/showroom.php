<?php

namespace App\Models;

use App\Models\Company;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class showRoom extends Model
{
    use HasFactory;
    protected $table ='show_rooms';
    protected $guarded =[];


    public function company(): BelongsTo
    {
        return $this->belongsTo(Company::class,'company_id');
    }

    public function customers(): BelongsToMany
    {
        return $this->BelongsToMany(showRoom::class );
    }






    
}
