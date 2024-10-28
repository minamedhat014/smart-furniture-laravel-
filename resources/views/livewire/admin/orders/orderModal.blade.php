<div>

<x-app-modal id="addOrderModal" type="storeOrder" title="Add order related to {{$customer->name ?? ''}}">
    <x-slot name="inputs">
      <x-form-select fname="Branch" bname="branch_id"  display="name" icon="fa-solid fa-store" :options="$branches" value="id" class="req" />
      <x-form-select fname="type" bname="order_type"  display="name" icon="fa-solid fa-clipboard-check" :options="[['name' => 'standard'], ['name' => 'c&c non-standard'],['name' => 'living non-standard'],['name' => 'kitchen non-standard']]" value="name" class="req" />
      <x-form-select fname="Sales name" bname="sales_name"  display="sales_name" icon="fa-solid fa-user" :options="$sales" value="sales_name" class="req" /> 
      <x-form-select fname="Address" bname="delivery_address_id"  display="zone" display2="address" icon="fa-solid fa-location-dot" :options="$address" value="id" class="req" />      
      <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
    </x-slot>
  </x-app-modal>
  

  <x-app-modal id="editorderModal" type="updateOrder" title="Edit order  related to {{$customer->name ?? ''}}">
    <x-slot name="inputs">
      <x-form-select fname="Branch" bname="branch_id"  display="name" icon="fa-solid fa-store" :options="$branches" value="id" class="req" />
      <x-form-select fname="type" bname="order_type"  display="name" icon="fa-solid fa-clipboard-check" :options="[['name' => 'standard'], ['name' => 'c&c non-standard'],['name' => 'living non-standard'],['name' => 'kitchen non-standard']]" value="name" class="req"/>
      <x-form-select fname="Sales name" bname="sales_name"  display="sales_name" icon="fa-solid fa-user" :options="$sales" value="sales_name" class="req"/> 
      <x-form-select fname="Address" bname="delivery_address_id"  display="zone" display2="address" icon="fa-solid fa-location-dot" :options="$address" value="id" class="req" />   
      <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
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
     <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
    </x-slot>
  </x-app-modal>
  

  
  <x-app-modal id="sendBackModel" type="sendBack" title="send to branch order related to {{$customer->name ?? ''}}">
    <x-slot name="inputs">
     <p> Are you sure you want to send  this order back to branch </p>
     <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
    </x-slot>
  </x-app-modal>
  

{{-- order confirmation  --}}
<x-app-modal id="confirmOrderModal" type="confirmOrder" title="Add order confirmation related to {{$customer->name ?? ''}}">
  <x-slot name="inputs">
<p class="text-danger">
Please make sure that the customer had paid the full amount before adding the order confirmation 
</p>
    <x-form-file-upload fname="upload files"  bname="files" class="req">
      <x-slot name="preview">
        @if ($files)
        @foreach ($files as $file)
      <h6> <i class="fa-solid fa-file-pdf"></i> {{$file->getClientOriginalName()}} </h6>
        <button wire:click="removeFile({{ $loop->index }})" class="btn btn-outline-light"><i class="fa-solid fa-circle-xmark" style="color: #a80505;"></i></button>
       @endforeach
       @endif
      </x-slot>
      </x-form-file-upload>
      <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
  </x-slot>
</x-app-modal>





{{-- order tracking  --}}



<x-app-modal id="orderTrackingModal" type=" " title="track order related to {{$customer->name ?? ''}}">
  <x-slot name="inputs">
    @if($trackedOrder) 
    @foreach($trackedOrder->updates()->get() as $key => $track)

 <div>
  <span class="badge bg-primary"> 
      {{$track->transaction_name}} on {{$track-> created_at->format('Y-m-d')}} by   {{displayCreatedBy($track->created_by)}} with the following remarks : {{$track->remarks}}
  </span>
 </div>
     
    @endforeach
    @endif

  </x-slot>
</x-app-modal> 


{{-- set appointment for delivery date  --}}



<x-app-modal id="setAppointmentModal" type="addDeliveryAppointment" title="set delivery appointment related to {{$customer->name ?? ''}}">
  <x-slot name="inputs">
    <x-form-input  type="datetime-local" fname="appointment start" bname="appointment_start" icon="fa-solid fa-calender" class="req" />
    <x-form-input  type="datetime-local" fname="appointment end" bname="appointment_end" icon="fa-solid fa-calender" class="req" />
    <x-form-select  value="id"  display="name" :options="[['id' => 1, 'name' => 'Yes'],['id' => 0, 'name' => 'No']]" fname="is important" bname="appointment_importence" icon="fa-solid fa-circle-check" class="req" />
    <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
  </x-slot>
</x-app-modal> 

</div>