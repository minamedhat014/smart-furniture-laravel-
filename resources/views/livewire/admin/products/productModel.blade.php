<!-- add Modal -->
<x-app-modal id="addProductsModel" type="store" title=" Add Products">

  <x-slot name="inputs">
    <x-form-input  type="text" fname="Product Name" bname="name" icon="fa-brands fa-product-hunt" /> 
    <x-form-select  value="id"  display="name" :options="$types" fname="Product type" bname="type_id" icon="fa-solid fa-clipboard-check" />
    <x-form-select  value="id"  display="name" :options="$sources" fname="Product source" bname="source_id" icon="fa-brands fa-sourcetree" />
    <x-form-multi-select  value="name"  display="name" :options="$Materials" fname="Materials" bname="item_material" icon="fa-solid fa-cubes-stacked" />
    <x-form-input  type="text" fname="Descripation" bname="descripation" icon="fa-solid fa-pen" /> 
    <x-form-input  type="date" fname="Available date" bname="available_date" icon="fa-solid fa-calendar-days" />

    @if($type_id ==1 || $type_id ==5 || $type_id ==6)
    <div class="row justify-content-around col-12" >
    <x-form-input  type="text" fname="Fabric" bname="fabric" icon="fa-brands fa-slack" /> 
    <x-form-input  type="text" fname="Sponge" bname="sponge" icon="fa-brands fa-slack" /> 
    <x-form-input  type="text" fname="Sponge thickness" bname="sponge_thickness" icon="fa-brands fa-slack" /> 
    <x-form-select  value="id"  display="name" :options="[['id' => 1, 'name' => 'Yes'],['id' => 0, 'name' => 'No']]" fname="A Chair can be added" bname="chair_added" icon="fa-solid fa-circle-check" />
    <x-form-input  type="text" fname="Cushion number" bname="coshin_number" icon="fa-solid fa-arrow-up-9-1" /> 
    <x-form-input  type="text" fname="Cushion color" bname="coshin_color" icon="fa-solid fa-palette" /> 
    </div>
    @endif
    <x-form-select  value="id" display="name"  :options="[['id' => 1, 'name' => 'Yes'],['id' => 0, 'name' => 'No']]" fname="Divisablity" bname="divisablity" icon="fa-solid fa-circle-check" />
    <x-form-select  value="id"  display="name" :options="[['id' => 1, 'name' => 'Yes'],['id' => 0, 'name' => 'No']]" fname="Standard ability" bname="Standard_ability" icon="fa-solid fa-circle-check" />
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
    <x-form-input  type="text" fname="Product Name" bname="name" icon="fa-brands fa-product-hunt" /> 
    <x-form-select  value="id" display="name"  :options="$types" fname="Product type" bname="type_id" icon="fa-solid fa-clipboard-check" />
    <x-form-select  value="id" display="name"  :options="$sources" fname="Product source" bname="source_id" icon="fa-brands fa-sourcetree" />
    <x-form-multi-select  value="name" display="name" :options="$Materials" fname="Materials" bname="item_material" icon="fa-solid fa-cubes-stacked" />
    <x-form-input  type="text" fname="Descripation" bname="descripation" icon="fa-solid fa-pen" /> 
    <x-form-input  type="date" fname="Available date" bname="available_date" icon="fa-solid fa-calendar-days" />

    @if($type_id ==1 || $type_id ==5 || $type_id ==6)
  <div class="row justify-content-around col-12" >
    <x-form-input  type="text" fname="Fabric" bname="fabric" icon="fa-brands fa-slack" /> 
    <x-form-input  type="text" fname="Sponge" bname="sponge" icon="fa-brands fa-slack" /> 
    <x-form-input  type="text" fname="Sponge thickness" bname="sponge_thickness" icon="fa-brands fa-slack" /> 
    <x-form-select  value="id" display="name" :options="[['id' => 1, 'name' => 'Yes'],['id' => 0, 'name' => 'No']]" fname="A Chair can be added" bname="chair_added" icon="fa-solid fa-circle-check" />
    <x-form-input  type="text" fname="Cushion number" bname="coshin_number" icon="fa-solid fa-arrow-up-9-1" /> 
    <x-form-input  type="text" fname="Cushion color" bname="coshin_color" icon="fa-solid fa-palette" /> 
  </div>
    @endif
    <x-form-select  value="id" display="name" :options="[['id' => 1, 'name' => 'Yes'],['id' => 0, 'name' => 'No']]" fname="Divisablity" bname="divisablity" icon="fa-solid fa-circle-check" />
    <x-form-select  value="id" display="name" :options="[['id' => 1, 'name' => 'Yes'],['id' => 0, 'name' => 'No']]" fname="Standard ability" bname="Standard_ability" icon="fa-solid fa-circle-check" />
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


