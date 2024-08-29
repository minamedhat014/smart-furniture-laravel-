<?php

namespace App\Traits;

use Carbon\Carbon;

trait FormatDate {
   
   
 
   public function formatDateOnly($date)
   {
       return Carbon::parse($date)->format('Y-m-d');
   }
   


 
 
}