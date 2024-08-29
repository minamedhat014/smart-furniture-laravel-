

<!-- add Modal -->
<x-app-modal id="AddshowProductModal" type="store" title="Add product to showroom ">
  <x-slot name="inputs">
    <x-form-select  fname=" Product name" class="req"  display="name" :options="$products" bname="product_id" icon="fa-brands fa-product-hunt" value="id" />
    <x-form-input type="text" fname=" Quantity" class="req"   bname="quantity" icon="fa-solid fa-hashtag"/>
    <x-form-input type="text" fname="Special offer"  bname="special_offer" icon="fa-solid fa-tag"/>
    <x-form-input type="text" fname="Remarks"  bname="remarks" icon="fa-solid fa-bookmark"/>
  </x-slot>
</x-app-modal>

    
<!-- edit Modal -->
<x-app-modal id="editshowProductModal" type="update" title="Edit new product to showroom ">
  <x-slot name="inputs">
    <x-form-select  fname=" Product name" class="req"   display="name" :options="$products" bname="product_id" icon="fa-brands fa-product-hunt" value="id" />
    <x-form-input type="text" fname=" Quantity" class="req"  bname="quantity" icon="fa-solid fa-hashtag"/>
    <x-form-input type="text" fname="Special offer"  bname="special_offer" icon="fa-solid fa-tag"/>
    <x-form-input type="text" fname="Remarks"  bname="remarks" icon="fa-solid fa-bookmark"/>
  </x-slot>
</x-app-modal>


<!--  delete Modal -->
<x-app-modal id="deletshowProductModel" type="delete" title="Remove product from showroom ">
  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>

