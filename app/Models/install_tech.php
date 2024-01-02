<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class install_tech extends Model
{
    use HasFactory;
    protected $table='install_teches';
    protected $guarded=[];


    public function company() :BelongsTo{
      return $this->belongsTo(company::class,'company_id');
    }
}
