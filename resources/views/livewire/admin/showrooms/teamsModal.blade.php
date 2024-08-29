
<!-- add Modal -->

<x-app-modal id="AddNewStaffModal" type="store" title="Add new member to staff  branch">

  <x-slot name="inputs">
    <x-form-input type="text" fname=" Emplyee name" class="req"  bname="sales_name" icon="fa-solid fa-user-tie"/>
    <x-form-select  fname="Title"  display="name" class="req"  :options="[['id' => 1, 'name' => 'designer'],['id' => 0, 'name' => 'sales'],['id' => 2, 'name' => 'branch manager'],['id' => 3, 'name' => 'area sales manager']]" bname="title" icon="fa-solid fa-building" value="id" />
    <x-form-input type="phone" fname="phone"  class="req" bname="phone" icon="fa-solid fa-phone"/>
    <x-form-input type="email" fname="Email"  class="req" bname="email" icon="fa-solid fa-envelope"/>
  </x-slot>
</x-app-modal>


  
<!-- edit Modal -->
<x-app-modal id="editTeamModal" type="update" title="Edit staff">
  <x-slot name="inputs">
    <x-form-input type="text" fname=" Emplyee name" class="req"  bname="sales_name" icon="fa-solid fa-user-tie"/>
    <x-form-select  fname="Title"  display="name" class="req"  :options="[['id' => 1, 'name' => 'designer'],['id' => 0, 'name' => 'sales'],['id' => 2, 'name' => 'branch manager'],['id' => 3, 'name' => 'area sales manager']]" bname="title" icon="fa-solid fa-building" value="id" />
    <x-form-input type="email" fname="Email"  class="req" bname="email" icon="fa-solid fa-envelope"/>
    <x-form-input type="phone" fname="phone"  class="req" bname="phone" icon="fa-solid fa-phone"/>
  </x-slot>
</x-app-modal>


<!--  delete Modal -->
<x-app-modal id="deleteteamModel" type="delete" title="Remove staff member">
  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>

