{{-- add --}}
<x-app-modal id="addDetails" type="storeOrderDetails" title="Add order details ">
    <x-slot name="inputs">
      
      <x-form-select fname="item" bname="item_id"  display="item_code" icon="fa-brands fa-product-hunt" :options="$items" value="id" />
      <x-form-input  type="number" fname="Quantity" bname="quantity" icon="fa-solid fa-hashtag" />
      <x-form-input  type="text"  fname="branch discount" bname="branch_extra_discount"   icon="fa-solid fa-percent"/>
      <x-form-select fname="Warhouse" bname="wharehouse"  display="name" icon="fa-solid fa-warehouse" :options="$wharehouses" value="name" />
      <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment-dots" />
    </x-slot>
  </x-app-modal>
  
{{-- edit --}}
<x-app-modal id="editorderDetailsModal" type="store" title="Edit order details ">
  <x-slot name="inputs">
    
    <x-form-select fname="item" bname="item_id"  display="item_code" icon="fa-brands fa-product-hunt" :options="$items" value="id" />
    <x-form-input  type="number" fname="Quantity" bname="quantity" icon="fa-solid fa-hashtag" />
    <x-form-input  type="text"  fname="branch discount" bname="branch_extra_discount"   icon="fa-solid fa-percent"/>
    <x-form-select fname="Warhouse" bname="wharehouse"  display="name" icon="fa-solid fa-warehouse" :options="$wharehouses" value="name" />
    <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment-dots" />
  </x-slot>
</x-app-modal>



  
  <x-app-modal id="DeleteOrderDetailsModel" type="delete" title="Remove order related to">
    <x-slot name="inputs">
     <p> Are you sure you want to remove this record </p>
    </x-slot>
  </x-app-modal>
  

    
