<?php

namespace App\Traits;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



trait HasFileUpload {

    use WithFileUploads;

    public $file;



 
    public function updatedfile()
    {

        if (Storage::exists('app/files/' . $this->file->hashName())) {
            $this->addError('file', 'A file with this name already exists.');
            $this->file = null;
        }
    }

public function removeFile()
{
    unset($this->file);
}

public function save()
    {
        try{
            if($this->file !== null){
                $this->file->store('files');
                successMessage();
            } 
        }catch(\Exception $e){
           errorMessage($e);
        } 
    }



 
}