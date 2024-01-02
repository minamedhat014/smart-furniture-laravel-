{{-- add --}}
<x-app-modal id="addDetails" type="store" title="Add order details ">
    <x-slot name="inputs">
      
      <x-form-select fname="item" bname="item_id"  display="item_code" icon="fa-brands fa-product-hunt" :options="$items" value="id" />
      <x-form-input  type="number" fname="Quantity" bname="quantity" icon="fa-solid fa-hashtag" />
      <x-form-input  type="text"  fname="Unit price" bname="unit_price"   icon="fa-solid fa-money-bill"/>
      <x-form-input  type="text"  fname="branch discount" bname="branch_extra_discount"   icon="fa-solid fa-percent"/>
      <x-form-input  type="text"  fname="unit price after branch discount" bname="unit_price_after_branch_discount"   icon="fa-solid fa-money-bill"/>
      <x-form-input  type="text"  fname="total Item price" bname="final_price"   icon="fa-solid fa-money-bill"/>
      <x-form-select fname="Warhouse" bname="wharehouse"  display="name" icon="fa-solid fa-warehouse" :options="$wharehouses" value="name" />
      <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment-dots" />
    </x-slot>
  </x-app-modal>
  
{{-- edit --}}
<x-app-modal id="editorderDetailsModal" type="store" title="Edit order details ">
  <x-slot name="inputs">
    
    <x-form-select fname="item" bname="item_id"  display="item_code" icon="fa-brands fa-product-hunt" :options="$items" value="id" />
    <x-form-input  type="number" fname="Quantity" bname="quantity" icon="fa-solid fa-hashtag" />
    <x-form-input  type="text"  fname="Unit price" bname="unit_price"   icon="fa-solid fa-money-bill"/>
    <x-form-input  type="text"  fname="branch discount" bname="branch_extra_discount"   icon="fa-solid fa-percent"/>
    <x-form-input  type="text"  fname="unit price after branch discount" bname="unit_price_after_branch_discount"   icon="fa-solid fa-money-bill"/>
    <x-form-input  type="text"  fname="total Item price" bname="final_price"   icon="fa-solid fa-money-bill"/>
    <x-form-select fname="Warhouse" bname="wharehouse"  display="name" icon="fa-solid fa-warehouse" :options="$wharehouses" value="name" />
    <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment-dots" />
  </x-slot>
</x-app-modal>



  
  <x-app-modal id="DeleteOrderDetailsModel" type="delete" title="Remove order related to">
    <x-slot name="inputs">
     <p> Are you sure you want to remove this record </p>
    </x-slot>
  </x-app-modal>
  

    
