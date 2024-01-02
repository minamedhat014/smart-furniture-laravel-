
<!-- add Modal -->

<x-app-modal id="addRoleModal" type="store" title=" Add Roles ">
  <x-slot name="inputs">
    <x-form-input type="text" fname=" Role Name"  bname="name" icon="fa-solid fa-circle-user"/>
  </x-slot>
</x-app-modal>

<!--  Edit Modal -->
<x-app-modal id="editRoleModal" type="update" title=" Edit Roles ">
  <x-slot name="inputs">
    <x-form-input type="text" fname=" Role Name"  bname="name" icon="fa-solid fa-circle-user"/>
  </x-slot>
</x-app-modal>

<!--  assign Modal -->
<x-app-modal id="assignPermission" type="assignPermissions" title="Assign Roles  ">
  <x-slot name="inputs">
    <x-form-multi-select  display="name"  :options="$permissions" fname="Permissions" value="name" bname="assigned_Permissions" icon="fa-solid fa-user-lockr"/>
  </x-slot>
</x-app-modal>


<!--  remove permissions  Modal -->
<x-app-modal id="deleteRoleModel" type="delete" title="Delete Role">
  <x-slot name="inputs">
    <p class="text-danger"> Are you sure you want to delete this Roles ? </p>   
  </x-slot>
</x-app-modal>

<!--  delete Modal -->
<x-app-modal id="removeRole" type="removeRoles" title="Remove Role">
  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p> 
  </x-slot>
</x-app-modal>

