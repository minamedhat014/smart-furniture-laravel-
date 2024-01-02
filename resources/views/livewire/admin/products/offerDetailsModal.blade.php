<!-- add Modal -->

<x-app-modal id="addofferDetailsModel" type="store" title=" Add Details">

  <x-slot name="inputs">
    <x-form-select  value="id" display="item_code" :options="$items" fname="Item" bname="item_id" icon="fa-solid fa-couch" />
    <x-form-input  type="text" fname="Quantity" bname="quantity" icon="fa-solid fa-arrow-up-9-1" /> 
    <x-form-input  type="text" fname="Details" bname="details" icon="fa-solid fa-circle-info" /> 
    <x-form-input  type="text" fname="Normal Rates" bname="price" icon="fa-solid fa-sack-dollart" />
    <x-form-input  type="percentage" fname="Discount Ratio" bname="discount_entered" icon="fa-solid fa-percent" />
    <x-form-input  type="text" fname="End Price" bname="end_user_price" icon="fa-solid fa-percent" />
  </x-slot>
</x-app-modal>
 
<!--  Edit Modal -->
<x-app-modal id="editoffersDetialsModel" type="update" title=" Edit Details">
  <x-slot name="inputs">
  <x-form-select  value="id" display="item_code" :options="$items" fname="Item" bname="item_id" icon="fa-solid fa-couch" />
  <x-form-input  type="text" fname="Quantity" bname="quantity" icon="fa-solid fa-arrow-up-9-1" /> 
  <x-form-input  type="text" fname="Details" bname="details" icon="fa-solid fa-circle-info" /> 
  <x-form-input  type="text" fname="Normal Rates" bname="price" icon="fa-solid fa-sack-dollart" />
  <x-form-input  type="percentage" fname="Discount Ratio" bname="discount_entered" icon="fa-solid fa-percent" />
  <x-form-input  type="percentage" fname="End Price" bname="end_user_price" icon="fa-solid fa-percent" />
</x-slot>
</x-app-modal>  

   
<!--  delete Modal -->

<x-app-modal id="deleteofferDetailsModel" type="delete" title=" Delete Details">
  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>



