<!-- add Modal -->


<x-app-modal id="addModel" type="store" title=" Add installments">

  <x-slot name="inputs">
    <x-form-input  type="text" fname="Name" bname="name" icon="fa-solid fa-shield-heart" />
    <x-form-input  type="date" fname="Start Date " bname="start_from" icon="fa-solid fa-calendar" /> 
    <x-form-input  type="date" fname="End Date " bname="ends_at" icon="fa-solid fa-calendar" /> 
    <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
  </x-slot>
</x-app-modal>
 
<!--  Edit Modal -->
<x-app-modal id="editModel" type="update" title=" Edit installments">

  <x-slot name="inputs">
    <x-form-input  type="text" fname="Name" bname="name" icon="fa-solid fa-shield-heart" />
    <x-form-input  type="date" fname="Start Date " bname="start_from" icon="fa-solid fa-calendar" /> 
    <x-form-input  type="date" fname="End Date " bname="ends_at" icon="fa-solid fa-calendar" /> 
    <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
  </x-slot>
</x-app-modal>

   
<!--  delete Modal -->

<x-app-modal id="deleteModel" type="delete" title=" Delete installments">
  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>
