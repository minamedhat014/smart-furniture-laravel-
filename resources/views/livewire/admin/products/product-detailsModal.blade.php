<div>
  {{-- Add Modal  --}}

  <x-app-modal id="ProductDetailsAddModel" type="store" title="Add Product details to {{$product_name}}" >

    <x-slot name="inputs">
      <x-form-input  type="text" fname="Item Code" bname="item_code" icon="fa-solid fa-barcode" />
      <x-form-input  type="text" fname="item descripation" bname="descripation" icon="fa-solid fa-pen" /> 
      <x-form-select fname="component Name" display="name" bname="component_name" icon="fa-brands fa-buromobelexperte" :options="$componentNames" value="name" /> 
      <x-form-input  type="text" fname="Item Color" bname="item_color" icon="fa-solid fa-brush" />
      <x-form-input  type="text" fname="Quantity" bname="quantity" icon="fa-solid fa-boxes-stacked" />
      <x-form-input  type="text" fname="Item Width in CM" bname="item_width" icon="fa-solid fa-left-right" />
      <x-form-input  type="text" fname="Item Hieght in CM " bname="item_hieght" icon="fa-solid fa-up-down" />
      <x-form-input  type="text" fname="Item outer Depth in CM" bname="item_out_depth" icon="fa-solid fa-up-long" />
      <x-form-input  type="text" fname="Item inner Depth in CM" bname="item_inner_depth" icon="fa-solid fa-up-long" />
      <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
      <x-form-input  type="text" fname="Factory Price" bname="original_price" icon="fa-solid fa-money-bill-wave" /> 
      <x-form-input  type="text" fname="Enduser price" bname="final_price" icon="fa-solid fa-money-bill-wave" />
     
        
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
      <x-form-input  type="text" fname="Item Width in CM" bname="item_width" icon="fa-solid fa-left-right" />
      <x-form-input  type="text" fname="Item Hieght in CM" bname="item_hieght" icon="fa-solid fa-up-down" />
      <x-form-input  type="text" fname="Item outer Depth in CM" bname="item_out_depth" icon="fa-solid fa-up-long" />
      <x-form-input  type="text" fname="Item inner Depth in CM" bname="item_inner_depth" icon="fa-solid fa-up-long" />
      <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
      <x-form-input  type="text" fname="Factory Price" bname="original_price" icon="fa-solid fa-money-bill-wave" /> 
      <x-form-input  type="text" fname="Enduser price" bname="final_price" icon="fa-solid fa-money-bill-wave" />
    
    </x-slot>
  </x-app-modal>
  
  {{-- delete modal  --}}
  
  
  <x-app-modal id="deleteProductsDetailsModel" type="delete" title="Delete Product details">
  
    <x-slot name="inputs">
      <p class="text-danger"> are you sure you want to delete this record ? </p>
    </x-slot>
  </x-app-modal>
    
    
</div>
  
  
  
  
    
    
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  


 