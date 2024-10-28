<x-app-modal id="productUpload" type="updateProducts" title="upload exstrnal list">

    <x-slot name="inputs">
     <p class="text-danger">
       please note by uploading a new file you will delete and update all the current records !! 
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
{{-- 
        customer modal  --}}
  <x-app-modal id="customerUpload" type="updateCustomers" title="upload exstrnal list">

    <x-slot name="inputs">
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