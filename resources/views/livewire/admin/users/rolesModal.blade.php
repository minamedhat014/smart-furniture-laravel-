
<!-- add Modal -->

<x-app-modal id="addRoleModal" type="store" title=" Add Roles ">
  <x-slot name="inputs">
    <x-form-input type="text" fname=" Role Name" class="req"  bname="name" icon="fa-solid fa-circle-user"/>
  </x-slot>
</x-app-modal>

<!--  Edit Modal -->
<x-app-modal id="editRoleModal" type="update" title=" Edit Roles ">
  <x-slot name="inputs">
    <x-form-input type="text" fname=" Role Name" class="req"   bname="name" icon="fa-solid fa-circle-user"/>
  </x-slot>
</x-app-modal>

<!--  assign Modal -->
<x-app-modal id="assignPermission" type="assignPermissions" title="Assign permissions to this Role">
  <x-slot name="inputs">
    <x-form-checkbox  :options="$permissions"  class="req" display="name" fname="Permissions" icon="fa-solid fa-user-lockr"/>
  </x-slot>
</x-app-modal>


<!--  assign Modal -->
<x-app-modal id="syncPermission" type="syncPermissions" title="sync permissions to this Role">
  <x-slot name="inputs">
    <x-form-checkbox  :options="$permissions"  class="req" display="name" fname="Permissions" icon="fa-solid fa-user-lockr"/>
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

