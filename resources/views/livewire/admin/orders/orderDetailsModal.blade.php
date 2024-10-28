{{-- add --}}
<x-app-modal id="addDetails" type="storeOrderDetails" title="Add order details ">
    <x-slot name="inputs">
      
      
      @if($order_type == "kitchen non-standard")
      <p> Regarding specifications please enter width in CM ,hight in CM and Punching in order separated by (-)</p> 
      <x-form-select fname="item" bname="item_id"  display="item_code" icon="fa-brands fa-product-hunt" :options="$items" value="id" class="req"/>
      <x-form-input  type="text"  fname="specifications" bname="specifications"   icon="fa-solid fa-circle-info" class="req"/>
      @endif

      @if($order_type == "living non-standard")
      <p> Regarding specifications please enter fabric code and color code </p> 
      <x-form-select fname="item" bname="item_id"  display="item_code" icon="fa-brands fa-product-hunt" :options="$items" value="id" class="req"/>
      <x-form-input  type="text"  fname="specifications" bname="specifications" class="req"  icon="fa-solid fa-circle-info"/>
      @endif

      @if($order_type == "standard")
      <x-form-select fname="item" bname="item_id"  display="item_code" icon="fa-brands fa-product-hunt" :options="$items" value="id" class="req"/>
      @endif

     <x-form-input  type="text" status="disabled" fname="Unit Price" bname="unit_price" icon="fa-solid fa-tag" class="req" />
      <x-form-input  type="number" fname="Quantity" bname="quantity" icon="fa-solid fa-hashtag" class="req" />
      <x-form-input  type="text"  fname="branch discount" bname="branch_extra_discount"   icon="fa-solid fa-percent"/>
      <x-form-input  type="text" status="disabled" fname="Unit Price After Discount" bname="unit_price_after_discount" icon="fa-solid fa-tag" class="req" />
      <x-form-input  type="text" status="disabled" fname="Sub total " bname="final_price" icon="fa-solid fa-tag" class="req"/>
      <x-form-select fname="Warhouse" bname="wharehouse"  display="name" icon="fa-solid fa-warehouse" :options="$wharehouses" value="name" class="req" />
      <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment-dots" />
    </x-slot>
  </x-app-modal>
  
{{-- edit --}}
<x-app-modal id="editorderDetailsModal" type="update" title="Edit order details ">
  <x-slot name="inputs">
    
   
    @if($order_type == "kitchen non-standard")
    <p> Regarding specifications please enter width in CM ,hight in CM and Punching in order separated by (-)</p> 
    <x-form-select fname="item" bname="item_id"  display="item_code" icon="fa-brands fa-product-hunt" :options="$items" value="id" class="req"/>
    <x-form-input  type="text"  fname="specifications" bname="specifications"   icon="fa-solid fa-circle-info" class="req"/>
    @endif

    @if($order_type == "living non-standard")
    <p> Regarding specifications please enter fabric code and color code </p> 
    <x-form-select fname="item" bname="item_id"  display="item_code" icon="fa-brands fa-product-hunt" :options="$items" value="id" class="req"/>
    <x-form-input  type="text"  fname="specifications" bname="specifications" class="req"  icon="fa-solid fa-circle-info"/>
    @endif

    @if($order_type == "standard")
    <x-form-select fname="item" bname="item_id"  display="item_code" icon="fa-brands fa-product-hunt" :options="$items" value="id" class="req"/>
    @endif
    <x-form-input  type="text" status="disabled" fname="Unit Price" bname="unit_price" icon="fa-solid fa-tag" class="req" />
     <x-form-input  type="number" fname="Quantity" bname="quantity" icon="fa-solid fa-hashtag" class="req"/>
     <x-form-input  type="text"  fname="branch discount" bname="branch_extra_discount"   icon="fa-solid fa-percent"/>
     <x-form-input  type="text" status="disabled" fname="Unit Price After Discount" bname="unit_price_after_discount" icon="fa-solid fa-tag" />
     <x-form-input  type="text" status="disabled" fname="Sub total " bname="final_price" icon="fa-solid fa-tag"  class="req"/>
     <x-form-select fname="Warhouse" bname="wharehouse"  display="name" icon="fa-solid fa-warehouse" :options="$wharehouses" value="name" class="req" />
     <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment-dots" />
  </x-slot>
</x-app-modal>



  
  <x-app-modal id="DeleteOrderDetailsModel" type="delete" title="Remove order related to">
    <x-slot name="inputs">
     <p> Are you sure you want to remove this record </p>
    </x-slot>
  </x-app-modal>
  

    
