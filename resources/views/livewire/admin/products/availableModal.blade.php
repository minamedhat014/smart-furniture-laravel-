{{-- upload modal  --}}

<x-app-modal id="uploaditems" type="updateList" title="upload exstrnal list">

  <x-slot name="inputs">
   <p class="text-danger">
     please note by uploading a new file you will delete and update all the current records of available items  !! 
   </p>
    <x-form-file-upload fname="upload file"  bname="file">
      <x-slot name="preview">
        @if ($file)
      <h6> <i class="fa-solid fa-file-excel"></i> {{$file->getClientOriginalName()}} </h6>
        <button wire:click="removeFile" class="btn btn-outline-light"><i class="fa-solid fa-circle-xmark" style="color: #a80505;"></i></button>
     
       @endif
      </x-slot>
      </x-form-file-upload>
  </x-slot>
</x-app-modal>


{{-- edit modal --}}
<x-app-modal id="editModal" type="update" title="Edit avilable items ">

  <x-slot name="inputs">
    <x-form-input  type="text" fname="Available quantity" bname="balance" icon="fa-solid fa-hashtag" />
    <x-form-input  type="text" fname=" Consumption per week" bname="consumption_rate_per_week" icon="fa-solid fa-calendar" /> 
    <x-form-input  type="date" fname="Available date " bname="available_date" icon="fa-solid fa-calendar" /> 
  </x-slot>
</x-app-modal>

  

{{-- delete modal --}}
<x-app-modal id="deleteModal" type="delete" title="delete assosiated avilable items ">

  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>


  

