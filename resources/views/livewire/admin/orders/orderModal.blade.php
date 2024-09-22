<div>
<x-app-modal id="addOrderModal" type="storeOrder" title="Add order related to {{$customer->name ?? ''}}">
    <x-slot name="inputs">
      <x-form-select fname="Branch" bname="branch_id"  display="name" icon="fa-solid fa-store" :options="$branches" value="id" />
      <x-form-select fname="Sales name" bname="sales_name"  display="sales_name" icon="fa-solid fa-user" :options="$sales" value="sales_name" /> 
      <x-form-select fname="Address" bname="delivery_address_id"  display="city" icon="fa-solid fa-location-dot" :options="$address" value="id" />      
      <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
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
  

  <x-app-modal id="editorderModal" type="updateOrder" title="Edit order  related to {{$customer->name ?? ''}}">
    <x-slot name="inputs">
      <x-form-select fname="Branch" bname="branch_id"  display="name" icon="fa-solid fa-store" :options="$branches" value="id" />
      <x-form-select fname="Sales name" bname="sales_name"  display="sales_name" icon="fa-solid fa-user" :options="$sales" value="sales_name" /> 
      <x-form-select fname="Address" bname="delivery_address_id"  display="city" icon="fa-solid fa-location-dot" :options="$address" value="id" />      
      <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
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
  
  
  <x-app-modal id="DeleteOrderModel" type="delete" title="Remove order related to {{$customer->name ?? ''}}">
    <x-slot name="inputs">
     <p> Are you sure you want to remove this record </p>
    </x-slot>
  </x-app-modal>
  

  <x-app-modal id="sendOrderModel" type="sendOrder" title="send to factory order related to {{$customer->name ?? ''}}">
    <x-slot name="inputs">
     <p> Are you sure you want to send  this order to factory  </p>
    </x-slot>
  </x-app-modal>
  

{{-- display images  --}}

<x-app-modal id="orderDocumentDisplay" type=" " title="order documents ">
  <x-slot name="inputs">

    <div class="row">
        <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
         @if($order)
          @foreach($order->getMedia('orders') as $image)
          <div class="carousel-item active ">
            <img src="{{ asset($image->getUrl()) }}" class="corsal-image">
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

</div>