<?php

namespace App\Traits;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;



trait HasFilesUpload {

    use WithFileUploads;

    public $files =[];

    
    
    protected function rules()
    {
         return [ 
            'files.*' => 'required|file|mimes:pdf|max:10240', // 1MB Max
       
         ];               
    }
 
    public function save($collection)
    {
    try {
        
        foreach ($this->files as $file) {
            $file->store($collection);
    }} catch (\Exception $e) {
     errorMessage($e);
          };
    }
    
    public function removeFile($index)
    {
        // Remove the photo at the specified index
        unset($this->files[$index]);
    
        // Optionally, you might want to re-index the array
        $this->files = array_values($this->files);
    }
    


 
}