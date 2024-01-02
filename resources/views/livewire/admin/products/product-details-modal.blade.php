{{-- Add Modal  --}}

<x-app-modal id="ProductDetailsAddModel" type="store" title="Add Product details">

  <x-slot name="inputs">
    <x-form-input  type="text" fname="Item Code" bname="item_code" icon="fa-solid fa-barcode" />
    <x-form-input  type="text" fname="item descripation" bname="descripation" icon="fa-solid fa-pen" /> 
    <x-form-select fname="component Name" display="name" bname="component_name" icon="fa-brands fa-buromobelexperte" :options="$componentNames" value="name" /> 
    <x-form-input  type="text" fname="Item Color" bname="item_color" icon="fa-solid fa-brush" />
    <x-form-input  type="text" fname="Quantity" bname="quantity" icon="fa-solid fa-boxes-stacked" />
    <x-form-input  type="text" fname="Item Width" bname="item_width" icon="fa-solid fa-left-right" />
    <x-form-input  type="text" fname="Item Hieght" bname="item_hieght" icon="fa-solid fa-up-down" />
    <x-form-input  type="text" fname="Item outer Depth" bname="item_out_depth" icon="fa-solid fa-up-long" />
    <x-form-input  type="text" fname="Item inner Depth" bname="item_inner_depth" icon="fa-solid fa-up-long" />
    <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
    <x-form-input  type="text" fname="Dealler Price" bname="dealler_price" icon="fa-solid fa-money-bill-wave" /> 
    <x-form-input  type="text" fname="Dealler margin" bname="entered_margin" icon="fa-solid fa-percent" /> 
    <x-form-input  type="text" fname="Enduser price before Discount" bname="end_before_discount" icon="fa-solid fa-money-bill-wave" />
    <x-form-input  type="text" fname="Special discount" bname="special_discount_entered" icon="fa-solid fa-percent" />
    <x-form-input  type="text" fname="Enduser price" bname="end_after_discount" icon="fa-solid fa-tag" />
  </x-slot>
</x-app-modal>

{{-- edit Modal  --}}

<x-app-modal id="ProductDetailsEditModel" type="update" title="Edit Product details">

  <x-slot name="inputs">
    <x-form-input  type="text" fname="Item Code" bname="item_code" icon="fa-solid fa-barcode" />
    <x-form-input  type="text" fname="item descripation" bname="descripation" icon="fa-solid fa-pen" /> 
    <x-form-select fname="component Name" display="name" bname="component_name" icon="fa-brands fa-buromobelexperte" :options="$componentNames" value="name" /> 
    <x-form-input  type="text" fname="Item Color" bname="item_color" icon="fa-solid fa-brush" />
    <x-form-input  type="text" fname="Quantity" bname="quantity" icon="fa-solid fa-boxes-stacked" />
    <x-form-input  type="text" fname="Item Width" bname="item_width" icon="fa-solid fa-left-right" />
    <x-form-input  type="text" fname="Item Hieght" bname="item_hieght" icon="fa-solid fa-up-down" />
    <x-form-input  type="text" fname="Item outer Depth" bname="item_out_depth" icon="fa-solid fa-up-long" />
    <x-form-input  type="text" fname="Item inner Depth" bname="item_inner_depth" icon="fa-solid fa-up-long" />
    <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
    <x-form-input  type="text" fname="Dealler Price" bname="dealler_price" icon="fa-solid fa-money-bill-wave" /> 
    <x-form-input  type="text" fname="Dealler Margin " bname="entered_margin" icon="fa-solid fa-percent" /> 
    <x-form-input  type="text" fname="Enduser price before Discount" bname="end_before_discount" icon="fa-solid fa-money-bill-wave" />
    <x-form-input  type="text" fname="Special discount" bname="special_discount_entered" icon="fa-solid fa-percent" />
    <x-form-input  type="text" fname="Enduser price" bname="end_after_discount" icon="fa-solid fa-tag" />
  </x-slot>
</x-app-modal>

{{-- delete modal  --}}


<x-app-modal id="deleteProductsDetailsModel" type="delete" title="Delete Product details">

  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>


 