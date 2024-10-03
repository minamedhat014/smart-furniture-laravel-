
{{-- add modal  --}}

<x-app-modal id="addModal" type="store" title="Add policy">
  <x-slot name="inputs">
    <x-form-select fname="Company" bname="company_id"  display="name" icon="fa-solid fa-building-shield" :options="$companies" value="id" class="req" /> 
    <x-form-select fname="Department" bname="department_id"  display="name" icon="fa-solid fa-building-shield" :options="$departments" value="id" class="req" /> 

    <x-form-input  type="text" fname="Policy Name" bname="policy_name" icon="fa-solid fa-book-bible"  class="req"/>
    <x-form-input  type="text" fname="Policy Description" bname="policy_description" icon="fa-solid fa-book-open-reader"  class="req"/>

    <x-form-file-upload fname="upload files"  bname="files" class="req">
      <x-slot name="preview">
        @if ($files)
        @foreach ($files as $file)
      <h6> <i class="fa-solid fa-file-pdf"></i> {{$file->getClientOriginalName()}} </h6>
        <button wire:click="removeFile({{ $loop->index }})" class="btn btn-outline-light"><i class="fa-solid fa-circle-xmark" style="color: #a80505;"></i></button>
       @endforeach
       @endif
      </x-slot>
      </x-form-file-upload>
  </x-slot>
</x-app-modal>


{{-- edit modal   --}}

<x-app-modal id="editPolicyModal" type="update" title="Edit Policy">
  <x-slot name="inputs">
    <x-form-select fname="Company" bname="company_id"  display="name" icon="fa-solid fa-building-shield" :options="$companies" value="id" class="req" /> 
    <x-form-select fname="Department" bname="department_id"  display="name" icon="fa-solid fa-building-shield" :options="$departments" value="id" class="req" /> 
    <x-form-input  type="text" fname="Policy Name" bname="policy_name" icon="fa-solid fa-book-bible"  class="req"/>
    <x-form-input  type="text" fname="Policy Description" bname="policy_description" icon="fa-solid fa-book-open-reader"  class="req"/>

    
    <x-form-file-upload fname="upload files"  bname="files" class="req">
      <x-slot name="preview">
        @if ($files)
        @foreach ($files as $file)
      <h6> <i class="fa-solid fa-file-pdf"></i> {{$file->getClientOriginalName()}} </h6>
        <button wire:click="removeFile({{ $loop->index }})" class="btn btn-outline-light"><i class="fa-solid fa-circle-xmark" style="color: #a80505;"></i></button>
       @endforeach
       @endif
      </x-slot>
      </x-form-file-upload>
      
  </x-slot>
</x-app-modal> 

{{-- delete model   --}}

<x-app-modal id="deletePolicyModal" type="delete" title="Remove Policy">
  <x-slot name="inputs">
    <p class="text-danger"> Are you sure you want Remove this Record</p>
  </x-slot>
</x-app-modal>

{{-- approve  --}}

<x-app-modal id="approvePolicyModal" type="approve" title="Approve Policy">
  <x-slot name="inputs">
    <p class="text-success"> Are you sure you want approve this policy and you have revised it </p>
  </x-slot>
</x-app-modal>



