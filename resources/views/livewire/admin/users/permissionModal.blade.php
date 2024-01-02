
<!-- add Modal -->

<x-app-modal id="addPermissioneModal" type="store" title="Add Permission ">
  <x-slot name="inputs">
    <x-form-input type="text" fname="Permission Name"  bname="name" icon="fa-solid fa-user-lock"/>
  </x-slot>
</x-app-modal>


  
<!--  Edit Modal -->

<x-app-modal id="editPermissionModal" type="update" title="Edit Permission ">
  <x-slot name="inputs">
    <x-form-input type="text" fname="Permission Name"  bname="name" icon="fa-solid fa-user-lock"/>
  </x-slot>
</x-app-modal>



   
<!--  delete Modal -->


<x-app-modal id="deletePermissionModel" type="delete" title="Remove Permission ">
  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>

