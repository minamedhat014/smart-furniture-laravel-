
<x-app-modal id="addorderModal" type="store" title="Add order related to {{$customer->name ?? ''}}">
    <x-slot name="inputs">
      <x-form-select fname="Branch" bname="branch_id"  display="name" icon="fa-solid fa-store" :options="$branches" value="id" />
      <x-form-select fname="Sales name" bname="sales_name"  display="sales_name" icon="fa-solid fa-user" :options="$sales" value="sales_name" /> 
      <x-form-select fname="Address" bname="delivery_address_id"  display="city" icon="fa-solid fa-location-dot" :options="$address" value="id" />      
      <x-form-input  type="date" fname="Delivery date" bname="delivery_date" icon="fa-solid fa-calnder" />
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
  

  <x-app-modal id="editorderModal" type="update" title="Edit order  related to {{$customer->name ?? ''}}">
    <x-slot name="inputs">
      <x-form-select fname="Branch" bname="branch_id"  display="name" icon="fa-solid fa-store" :options="$branches" value="id" />
      <x-form-select fname="Sales name" bname="sales_name"  display="sales_name" icon="fa-solid fa-user" :options="$sales" value="sales_name" /> 
      <x-form-select fname="Address" bname="delivery_address_id"  display="city" icon="fa-solid fa-location-dot" :options="$address" value="id" />      
      <x-form-input  type="date" fname="Delivery date" bname="delivery_date" icon="fa-solid fa-calnder" />
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
  
