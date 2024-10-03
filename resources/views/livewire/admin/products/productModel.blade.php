
<!-- add Modal -->
<x-app-modal id="addProductsModel" type="store" title=" Add Products">

  <x-slot name="inputs">
    <x-form-input  type="text" fname="Product Name" bname="name" icon="fa-brands fa-product-hunt" class="req" />
    <x-form-input  type="text" fname="SKU" bname="sku" icon="fa-solid fa-barcode" class="req" /> 
    <x-form-select  value="id"  display="name" :options="$types" fname="Product type" bname="type_id" icon="fa-solid fa-clipboard-check" class="req" />
    <x-form-select  value="id"  display="name" :options="$sources" fname="Product source" bname="source_id" icon="fa-brands fa-sourcetree" class="req"  />
     <x-form-multi-select  value="id"  display="name" :options="$Materials" fname="Materials" bname="item_material" icon="fa-solid fa-cubes-stacked"  class="req" />
    <x-form-input  type="text" fname="Descripation" bname="descripation" icon="fa-solid fa-pen" /> 
   

    @if($type_id == 1 || $type_id == 6)
    <x-form-input  type="text" fname="Fabric" bname="fabric" icon="fa-brands fa-slack" /> 
    <x-form-input  type="text" fname="Sponge" bname="sponge" icon="fa-brands fa-slack" /> 
    <x-form-input  type="text" fname="Sponge thickness" bname="sponge_thickness" icon="fa-brands fa-slack" /> 
    <x-form-select  value="id"  display="name" :options="[['id' => 1, 'name' => 'Yes'],['id' => 0, 'name' => 'No']]" fname="A Chair can be added" bname="chair_added" icon="fa-solid fa-circle-check" class="req" />
    <x-form-input  type="text" fname="Cushion number" bname="coshin_number" icon="fa-solid fa-arrow-up-9-1" /> 
    @endif

    <x-form-select  value="id" display="name"  :options="[['id' => 1, 'name' => 'Yes'],['id' => 0, 'name' => 'No']]" fname="Divisablity" bname="divisablity" icon="fa-solid fa-circle-check" class="req"  />
    <x-form-select  value="id"  display="name" :options="[['id' => 1, 'name' => 'Yes'],['id' => 0, 'name' => 'No']]" fname="Standard ability" bname="Standard_ability" icon="fa-solid fa-circle-check" class="req" />

      @if($Standard_ability ==1)
      <x-form-input  type="text" fname="Warranty years" bname="warranty_years" icon="fa-solid fa-hash" /> 
      @endif
   <x-form-photo fname="Images"  bname="photos">
  <x-slot name="preview">
    @if ($photos)
    @foreach($photos as  $photo)
    <img src="{{ $photo->temporaryUrl() }}" width="100px" height="100px">
    <button wire:click="removePhoto({{ $loop->index }})" class="btn btn-outline-light"><i class="fa-solid fa-circle-xmark" style="color: #a80505;"></i></button>
    @endforeach
   @endif
  </x-slot>
  </x-form-photo>
  </x-slot>
</x-app-modal>
 
{{-- edit Modal            --}}

<x-app-modal id="editProductsModel" type="update" title=" Edit Products">

  <x-slot name="inputs">
    <x-form-input  type="text" fname="Product Name" bname="name" icon="fa-brands fa-product-hunt" class="req"  /> 
    <x-form-input  type="text" fname="SKU" bname="sku" icon="fa-solid fa-barcode" class="req" /> 
    <x-form-select  value="id" display="name"  :options="$types" fname="Product type" bname="type_id" icon="fa-solid fa-clipboard-check" class="req"  />
    <x-form-select  value="id" display="name"  :options="$sources" fname="Product source" bname="source_id" icon="fa-brands fa-sourcetree" class="req"  />
    <x-form-multi-select  value="id"  display="name" :options="$Materials" fname="Material" bname="item_material" icon="fa-solid fa-cubes-stacked" class="req"  />
    <x-form-input  type="text" fname="Descripation" bname="descripation" icon="fa-solid fa-pen" /> 
   
    @if($type_id ==1 || $type_id ==6)
 
    <x-form-input  type="text" fname="Fabric" bname="fabric" icon="fa-brands fa-slack" /> 
    <x-form-input  type="text" fname="Sponge" bname="sponge" icon="fa-brands fa-slack" /> 
    <x-form-input  type="text" fname="Sponge thickness" bname="sponge_thickness" icon="fa-brands fa-slack" /> 
    <x-form-select  value="id" display="name" :options="[['id' => 1, 'name' => 'Yes'],['id' => 0, 'name' => 'No']]" fname="A Chair can be added" bname="chair_added" icon="fa-solid fa-circle-check" class="req"  />
    <x-form-input  type="text" fname="Cushion number" bname="coshin_number" icon="fa-solid fa-arrow-up-9-1" /> 
    @endif
    <x-form-select  value="id" display="name" :options="[['id' => 1, 'name' => 'Yes'],['id' => 0, 'name' => 'No']]" fname="Divisablity" bname="divisablity" icon="fa-solid fa-circle-check" class="req"  />
    <x-form-select  value="id" display="name" :options="[['id' => 1, 'name' => 'Yes'],['id' => 0, 'name' => 'No']]" fname="Standard ability" bname="Standard_ability" icon="fa-solid fa-circle-check" class="req" />

      @if($Standard_ability ==1)
      <x-form-input  type="text" fname="Warranty years" bname="warranty_years" icon="fa-solid fa-hash" /> 
      @endif
      
   <x-form-photo fname="Images"  bname="photos">
  <x-slot name="preview">
    @if ($photos)
    @foreach($photos as  $photo)
    <img src="{{ $photo->temporaryUrl() }}" width="100px" height="100px">
    <button wire:click="removePhoto({{ $loop->index }})" class="btn btn-outline-light"><i class="fa-solid fa-circle-xmark" style="color: #a80505;"></i></button>
    @endforeach
   @endif
  </x-slot>
  </x-form-photo>
  </x-slot>
</x-app-modal>
   
<!--  delete Modal -->

<x-app-modal id="deleteProductsModel" type="delete" title=" Remove Products">

  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>

  

{{-- cancel modal --}}
<x-app-modal id="ProductCancelModel" type="cancel" title="Cancel Product">

  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to cancel this record ? </p>
  </x-slot>
</x-app-modal>


  
{{-- luanch modal --}}

<x-app-modal id="ProductLaunchModel" type="launch" title="Luanch Product">

  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to Luanch this record ? </p>
  </x-slot>
</x-app-modal>




{{-- display images  --}}

<x-app-modal id="productDisplay" type="" title="Product Images">
  <x-slot name="inputs">

    <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
         @if($product)
          @foreach($product->getMedia('products') as $image)
          <div class="carousel-item active ">
            <img src="{{ asset($image->getUrl()) }}" class="corsal-image" alt="..." >
          </div>  
          @endforeach
          @endif
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon " aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
      </div>

  </x-slot>
</x-app-modal>
