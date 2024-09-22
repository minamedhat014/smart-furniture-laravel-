{{-- add --}}
<x-app-modal id="addDetails" type="storeOrderDetails" title="Add order details ">
    <x-slot name="inputs">
      
      <x-form-select fname="item" bname="item_id"  display="item_code" icon="fa-brands fa-product-hunt" :options="$items" value="id" class="req"/>
     

      <div class="feild col-lg-4 col-md-8 col-sm-12">
        <label for=""> unit price </label> 
        <i class="fa-solid fa-tag"></i>
        <input type="text" class="feild-input"  disabled id="price"  placeholder="unit price"  @if($errors->has($unit_price))style=" box-shadow: 1px 3px 5px #f54747;" @endif wire:model.blur="unit_price" >
        @if($errors->has($unit_price))
        <span class="feild-span">{{ $errors->first($unit_price) }}</span>
        @endif
     </div>

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

    <div class="feild col-lg-4 col-md-8 col-sm-12">
      <label for=""> unit price </label> 
      <i class="fa-solid fa-tag"></i>
      <input type="text" class="feild-input"  disabled id="price"  placeholder="unit price"  @if($errors->has($unit_price))style=" box-shadow: 1px 3px 5px #f54747;" @endif wire:model.blur="unit_price" >
      @if($errors->has($unit_price))
      <span class="feild-span">{{ $errors->first($unit_price) }}</span>
      @endif
   </div>

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
  

    
