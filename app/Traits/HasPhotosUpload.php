<?php

namespace App\Traits;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;



trait HasPhotosUpload {

    use WithFileUploads;

    public $photos =[];

    
    
    protected function rules()
    {
         return [ 
            'photos.*' => 'required|image|mimes:jpeg,png,pdf|max:1024', // 1MB Max
       
         ];               
    }
 
    public function save()
    {
    try {
        
        foreach ($this->photos as $photo) {
            $photo->store('products');
    }} catch (\Exception $e) {
     errorMessage($e);
          };
    }
    
    public function removePhoto($index)
    {
        // Remove the photo at the specified index
        unset($this->photos[$index]);
    
        // Optionally, you might want to re-index the array
        $this->photos = array_values($this->photos);
    }
    


 
}