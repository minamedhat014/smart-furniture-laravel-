
<!-- add Modal -->

<x-app-modal id="AddInstallModal" type="store" title="Add new installation technician ">

  <x-slot name="inputs">
    <x-form-input type="text" fname=" technicain name" class="req"  bname="name" icon="fa-solid fa-user-tie"/>
    <x-form-input type="email" fname="Email"  bname="email" icon="fa-solid fa-envelope"/>
    <x-form-input type="phone" fname="Phone"  bname="phone" class="req"  icon="fa-solid fa-phone"/>
  </x-slot>
</x-app-modal>


  
<!-- edit Modal -->
<x-app-modal id="editInstallModal" type="update" title="Edit installation technician ">
  <x-slot name="inputs">
    <x-form-input type="text" fname=" technicain name"   class="req" bname="name" icon="fa-solid fa-user-tie"/>
    <x-form-input type="email" fname="Email"  bname="email" icon="fa-solid fa-envelope"/>
    <x-form-input type="phone" fname="Phone" class="req"  bname="phone" icon="fa-solid fa-phone"/>
  </x-slot>
</x-app-modal>


<!--  delete Modal -->
<x-app-modal id="deleteInstallModel" type="delete" title="Remove installation technician">
  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>

