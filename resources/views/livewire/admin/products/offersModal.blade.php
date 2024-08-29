<!-- add Modal -->
<x-app-modal id="addoffersModel" type="store" title=" Add offer">

<x-slot name="inputs">
    <x-form-input  type="text" fname=" Offer Name " bname="name" icon="fa-solid fa-shield-heart"  class="req" /> 
    <x-form-input  type="date" fname="Start Date" bname="start_date" icon="fa-solid fa-calendar" /> 
    <x-form-input  type="date" fname="End Date" bname="end_date" icon="fa-solid fa-calendar" /> 
    <x-form-select  :options="$offers" display="name" fname="Offer Type" bname="type_id" value="id" icon="fa-solid fa-shield-heart" />
    <x-form-input  type="text" fname="Requirments" bname="requirments" icon="fa-solid fa-registered" />
    <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
  </x-slot>

</x-app-modal>
 
  
<!--  Edit Modal -->


<x-app-modal id="editoffersModel" type="update" title=" Edit Offer">

  <x-slot name="inputs">
    <x-form-input  type="text" fname=" Offer Name" bname="name" icon="fa-solid fa-shield-heart" /> 
    <x-form-input  type="date" fname="Start Date" bname="start_date" icon="fa-solid fa-calendar" /> 
    <x-form-input  type="date" fname="End Date" bname="end_date" icon="fa-solid fa-calendar" /> 
    <x-form-select  :options="$offers" display="name"  fname="Offer Type" bname="type_id" value="id" icon="fa-solid fa-shield-heart" />
    <x-form-input  type="text" fname="Requirments" bname="requirments" icon="fa-solid fa-registered" />
    <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />

  </x-slot>
</x-app-modal>
  
<!--  delete Modal -->
<x-app-modal id="deleteoffersModel" type="delete" title=" Remove Offer" >
  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>

<x-app-modal id="runDiscount" type="runDiscount" title="Run discount">
  <x-slot name="inputs">
    <x-form-input  type="text" fname="Discount precent" bname="discount_precent" icon="fa-solid fa-gift" />
  </x-slot>
</x-app-modal>
  

<x-app-modal id="assignProducts" type="AssignProducts" title="assign products to this offer">
  <x-slot name="inputs">
    <x-form-checkbox  :options="$discountable_products"  display="name" fname="select products" icon="fa-solid fa-shield-heart" />
  </x-slot>
</x-app-modal>
  


<x-app-modal id="launchOffer" type="Launch" title="Launch offer">
  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to Launch this offer ? </p>
  </x-slot>
</x-app-modal>



<x-app-modal id="suspendOffer" type="suspend" title="Suspend offer">
  <x-slot name="inputs">
    <p class="text-danger"> please note by suspending this offer all the associated products and discounts will be removed  so are you sure you want to suspend this offer ? </p>
  </x-slot>
</x-app-modal>