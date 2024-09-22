<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PolicyLine extends Model
{
    use HasFactory;

    protected $table ='policy_lines';
    protected $guarded   = ['id'];

    public function  policy(){
        return $this->belongsTo(CompanyPolicy::class,'policy_id');
       }

}
