<?php

namespace App\Traits;

use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



trait HasPhotoUpload {

    use WithFileUploads;

    public $photo;

    
    
    protected function rules()
    {
         return [ 
            'photo' => 'nullable|image|mimes:jpeg,png,pdf|max:1024', // 1MB Max
       
         ];               
    }
 
 
    public function updatedPhoto()
    {
        if (Storage::exists('app/photos/' . $this->photo->hashName())) {
            $this->addError('photo', 'A photo with this name already exists.');
            $this->photo = null;
        }
    }

public function removePhoto()
{
    unset($this->photo);
}

public function save()
    {
        try{
            if($this->photo !== null){
                $this->photo->store('photos');
                session()->flash('success','done successfully'); 
            } 
        }catch(\Exception $e){
            session()->flash('error',$e);
        } 
    }



 
}