
<!-- add Modal -->

<!-- add Modal -->
<x-app-modal id="addversionModel" type="store" title=" Add Product update ">

  <x-slot name="inputs">
    <x-form-select  value="id"  display="name" :options="$products" fname="Product " bname="product_id" icon="fa-brands fa-product-hunt" />
    <x-form-input  type="text" fname="update summary" bname="version_summary" icon="fa-regular fa-comment-dots" /> 
    <x-form-select  value="id" display="name" :options="$reasons" fname="Reason " bname="reason_id" icon="fa-solid fa-clipboard-question" />
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
 
<!--  Edit Modal -->

<x-app-modal id="editVersionsModel" type="update" title=" Edit Product update ">

  <x-slot name="inputs">
    <x-form-select  value="id"   display="name"  :options="$products" fname="Product " bname="selected" icon="fa-solid fa-product-hunt" />
    <x-form-input  type="text" fname="update summary" bname="version_summary" icon="fa-regular fa-comment-dots" /> 
    <x-form-select  value="id" display="name" :options="$reasons" fname="Reason" bname="reason_id" icon="fa-solid fa-clipboard-question" /> 
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


<x-app-modal id="deleteVersionsModel" type="delete" title=" Remove Product update ">

  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>  
  </x-slot>
</x-app-modal>
   
<!--  image Modal -->

<!-- Modal -->
<div wire:ignore.self class="modal fade" id="imageVersionsModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="imageVersionsModel">Product Version images</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    @foreach($data as $row)
    @foreach($row->getMedia('versions') as $image)
    <div class="carousel-item active">
      <img src="{{ asset($image->getUrl()) }}" class="d-block w-100" alt="...">
    </div>  
    @endforeach
    @endforeach
    
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



