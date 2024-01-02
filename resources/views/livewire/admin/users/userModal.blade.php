<!-- add Modal -->
<x-app-modal id="addUserModal" type="store" title="Add user">
  <x-slot name="inputs">
   <x-form-input type="text" fname="Name" bname="name" icon="fa-solid fa-user-plus"/>
   <x-form-input type="email" fname="Email" bname="email" icon="fa-solid fa-envelope"/>
   <x-form-input type="password" fname="Password" bname="password" icon="fa-solid fa-key"/>
   <x-form-select  :options="$companies" value="id"  display="name"  fname="Company" bname="company_id" icon="fa-solid fa-store"/>
    <x-form-photo fname="Image"  bname="photo">
      <x-slot name="preview">
        @if ($photo)
        <img src="{{$photo->temporaryUrl() }}" width="100px">
        <button wire:click="removePhoto" class="btn btn-outline-light"><i class="fa-solid fa-circle-xmark" style="color: #a80505;"></i></button>
       @endif
      </x-slot>
      </x-form-photo>

  </x-slot>
</x-app-modal>

<!--  Edit Modal -->

<x-app-modal id="editUserModal" type="update" title="Edit user">
  <x-slot name="inputs">
   <x-form-input type="text" fname="Name" bname="name" icon="fa-solid fa-user-plus"/>
   <x-form-input type="email" fname="Email" bname="email" icon="fa-solid fa-envelope"/>
   <x-form-input type="password" fname="Password" bname="password" icon="fa-solid fa-key"/>
   <x-form-select  :options="$companies" value="id"  display="name"  fname="Company" bname="company_id" icon="fa-solid fa-store"/>
    <x-form-photo fname="Image"  bname="photo">
      <x-slot name="preview">
        @if ($photo)
        <img src="{{$photo->temporaryUrl() }}" width="100px">
        <button wire:click="removePhoto" class="btn btn-outline-light"><i class="fa-solid fa-circle-xmark" style="color: #a80505;"></i></button>
       @endif
      </x-slot>
      </x-form-photo>

  </x-slot>
</x-app-modal>

<!--  assign Modal -->


<x-app-modal id="assignRole" type="assignRoles" title="Assign Roles" >
  <x-slot name="inputs">
  <x-form-multi-select  display="name"  :options="$roles" fname="Assgin roles" bname="assigned_roles"  value="name" icon="fa-solid fa-user-lock" />
  </x-slot>
</x-app-modal>


  

<!--  remove roles  Modal -->

<x-app-modal id="removeRoles" type="removeRoles" title="Remove Roles">
  <x-slot name="inputs">
    <p class="text-danger"> Are you sure you want to delete this Roles ? </p>  
  </x-slot>
</x-app-modal>
  
<!--  delete Modal -->

<x-app-modal id="deleteUserModel" type="delete" title="Remove User">
  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>

