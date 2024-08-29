
<!-- add Modal -->

<x-app-modal id="AddshowroomModal" type="store" title="Add showroom">
  <x-slot name="inputs">
    <x-form-input type="text" fname=" Branch name" class="req"  bname="name" icon="fa-solid fa-store"/>
    <x-form-select  fname="Distributor"  display="name" class="req"   :options="$dists" bname="company_id" icon="fa-solid fa-building" value="id" />
    <x-form-input type="time" fname="Opens at" class="req"  bname="working_from" icon="fa-solid fa-clock"/>
    <x-form-input type="time" fname="Closes at"  class="req"  bname="working_to" icon="fa-solid fa-clock"/>
    <x-form-input type="text" fname="Location"  class="req"  bname="location" icon="fa-solid fa-location-dot"/>
    <x-form-input type="phone" fname="Phone" class="req"  bname="phone" icon="fa-solid fa-phone"/>
  </x-slot>
</x-app-modal>


  
<!--  Edit Modal -->
<x-app-modal id="editshowroomModel" type="update" title="Edit showroom">
  <x-slot name="inputs">
    <x-form-input type="text" fname=" Branch name" class="req"  bname="name" icon="fa-solid fa-store"/>
    <x-form-select  fname="Distributor"   class="req" display="name" :options="$dists" bname="company_id" icon="fa-solid fa-building" value="id" />
    <x-form-input type="time" fname="Opens at" class="req"  bname="working_from" icon="fa-solid fa-clock"/>
    <x-form-input type="time" fname="Closes at" class="req"  bname="working_to" icon="fa-solid fa-clock"/>
    <x-form-input type="text" fname="Location" class="req"  bname="location" icon="fa-solid fa-location-dot"/>
    <x-form-input type="phone" fname="Phone" class="req"  bname="phone" icon="fa-solid fa-phone"/>
  </x-slot>
</x-app-modal>
  
<!--  delete Modal -->

<x-app-modal id="deleteShowroomModel" type="delete" title="Remove showroom">
  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>

{{-- canel modal --}}
<x-app-modal id="closeShowroomModal" type="close" title="close showroom">
  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to close this branch? </p>  
  </x-slot>
</x-app-modal>

  
