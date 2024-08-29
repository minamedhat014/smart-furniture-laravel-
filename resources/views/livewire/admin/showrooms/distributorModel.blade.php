<div>
<!-- add Modal -->
<x-app-modal id="addDistModel" type="store" title="Add Distributor">
  <x-slot name="inputs">
    <x-form-input type="text" fname="Distributor Name" bname="name" class="req" icon="fa-solid fa-store"/>
  </x-slot>
</x-app-modal>
  
<!--  Edit Modal -->
<x-app-modal id="editDistModel" type="update" title="Edit Distributor">
  <x-slot name="inputs">
    <x-form-input type="text" fname="Distributor Name "  class="req"  bname="name" icon="fa-solid fa-store"/>
  </x-slot>
</x-app-modal>
<!--  delete Modal -->
<x-app-modal id="deleteDistModel" type="delete"  title="Remove Distributor">
  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>



</div>