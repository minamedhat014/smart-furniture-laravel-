<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class installmentDetails extends Model
{
    use HasFactory;

    protected $table ='installment_details';
    protected $guarded =[];

    public function installment ():BelongsTo{
        return $this->BelongsTo(installment::class);
    }

 
}
