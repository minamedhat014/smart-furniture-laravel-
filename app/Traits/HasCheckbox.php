<?php

namespace App\Traits;

trait HasCheckbox {
   
   public $check_search;
   public $checked_ids=[];


   public function checked ($value){
      if (in_array($value, $this->checked_ids)) {
         $index = array_search($value, $this->checked_ids);
         unset($this->checked_ids[$index]);
     }
     else{
      array_push($this->checked_ids,$value);
     }
     
   }


   


 
 
}