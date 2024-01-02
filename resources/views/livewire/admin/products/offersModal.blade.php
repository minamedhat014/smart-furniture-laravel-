

<!-- add Modal -->
<x-app-modal id="addoffersModel" type="store" title=" Add Offer " >

  <x-slot name="inputs">
    <x-form-input  type="text" fname=" Offer Name" bname="name" icon="fa-solid fa-shield-heart" /> 
    <x-form-input  type="date" fname="Start Date" bname="start_date" icon="fa-solid fa-calendar" /> 
    <x-form-input  type="date" fname="End Date" bname="end_date" icon="fa-solid fa-calendar" /> 
    <x-form-select  :options="$offers" display="name" fname="Offer Type" bname="type_id" value="id" icon="fa-solid fa-shield-heart" />
    <x-form-multi-select  :options="$productsType" display="name" fname="Product Type" bname="product_types" value="name" icon="fa-brands fa-product-hunt" />
    <x-form-input  type="text" fname="Requirments" bname="requirments" icon="fa-solid fa-registered" />
    <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
    <x-form-input  type="text" fname="Applied ON" bname="applied_on" icon="fa-solid fa-clipboard-check" />
    <x-form-input  type="text" fname=" Not Applied ON" bname="not_applied_on" icon="fa-solid fa-square-xmarkt" />
  </x-slot>
</x-app-modal>

  
<!--  Edit Modal -->


<x-app-modal id="editoffersModel" type="update" title=" Edit Offer">

  <x-slot name="inputs">
    <x-form-input  type="text" fname=" Offer Name" bname="name" icon="fa-solid fa-shield-heart" /> 
    <x-form-input  type="date" fname="Start Date" bname="start_date" icon="fa-solid fa-calendar" /> 
    <x-form-input  type="date" fname="End Date" bname="end_date" icon="fa-solid fa-calendar" /> 
    <x-form-select  :options="$offers" display="name"  fname="Offer Type" bname="type_id" value="id" icon="fa-solid fa-shield-heart" />
    <x-form-multi-select  :options="$productsType"  display="name" fname="Product Type" bname="product_types" value="name" icon="fa-brands fa-product-hunt" />
    <x-form-input  type="text" fname="Requirments" bname="requirments" icon="fa-solid fa-registered" />
    <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
    <x-form-input  type="text" fname="Applied ON" bname="applied_on" icon="fa-solid fa-clipboard-check" />
    <x-form-input  type="text" fname=" Not Applied ON" bname="not_applied_on" icon="fa-solid fa-square-xmarkt" />
  </x-slot>
</x-app-modal>
  
<!--  delete Modal -->
<x-app-modal id="deleteoffersModel" type="delete" title=" Remove Offer" >

  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>
