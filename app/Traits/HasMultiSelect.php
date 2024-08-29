<?php

namespace App\Traits;

trait HasMultiSelect {
   
  

    public function mountHasMultiSelect(){
        $this->dispatch('pharaonic.select2.init');
 
    }


    public function hydrateHasMultiSelect(){
        $this->dispatch('pharaonic.select2.init');
      
    }

 
}