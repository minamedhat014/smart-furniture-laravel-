
{{-- add modal  --}}

<x-app-modal id="addModal" type="store" title="Add customer">
  <x-slot name="inputs">
    <x-form-input  type="text" fname="Customer Name" bname="name" icon="fa-solid fa-user" />
    <x-form-input  type="text" fname="customer's national id" bname="national_id" icon="fa-solid fa-user" /> 
    <x-form-multi-select fname="Branches"  display="name" bname="store_ids" icon="fa-solid fa-store" :options="$branches" value="id" /> 
    <x-form-select fname="types" bname="type"  display="name" icon="fa-solid fa-ranking-star" :options="$types" value="name" /> 
    <x-form-input  type="phone" fname="First phone" bname="phone1" icon="fa-solid fa-phone" />
    <x-form-input  type="phone" fname="Second phone" bname="phone2" icon="fa-solid fa-phone" />
    <x-form-select fname="city" bname="city"  display="name" icon="fa-solid fa-city" :options="$cities" value="name" /> 
    <x-form-input  type="text" fname="Address" bname="address" icon="fa-solid fa-location-dot" />
    <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
  </x-slot>
</x-app-modal>


{{-- edit modal   --}}

<x-app-modal id="editCustomerModel" type="update" title="Edit customer">
  <x-slot name="inputs">
    <x-form-input  type="text" fname="Customer Name" bname="name" icon="fa-solid fa-user" />
    <x-form-input  type="text" fname="customer's national id" bname="national_id" icon="fa-solid fa-user" /> 
    <x-form-multi-select fname="Branches"  display="name" bname="store_ids" icon="fa-solid fa-store" :options="$branches" value="id" /> 
    <x-form-select fname="types" bname="type"  display="name" icon="fa-solid fa-ranking-star" :options="$types" value="name" /> 
    <x-form-input  type="phone" fname="First phone" bname="phone1" icon="fa-solid fa-phone" />
    <x-form-input  type="phone" fname="Second phone" bname="phone2" icon="fa-solid fa-phone" />
    <x-form-select fname="city" bname="city"  display="name" icon="fa-solid fa-city" :options="$cities" value="name" /> 
    <x-form-input  type="text" fname="Address" bname="address" icon="fa-solid fa-location-dot" />
    <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
  </x-slot>
</x-app-modal>

{{-- delete model   --}}

<x-app-modal id="DeleteCustomerModel" type="delete" title="Remove customer">
  <x-slot name="inputs">
    <p> Are you sure you want Remove this Record</p>
  </x-slot>
</x-app-modal>

{{-- add address  --}}


<x-app-modal id="addAddress" type="addAddress" title="Add customer address"  >
 
    <x-slot name="inputs">
      <x-form-select fname="city" bname="city"  display="name" icon="fa-solid fa-city" :options="$cities" value="name"  /> 
      <x-form-input  type="text" fname="Address" bname="address" icon="fa-solid fa-location-dot"/>

    </x-slot>

</x-app-modal>


<x-app-modal id="editAddress" type="updateAddress" title="Edit customer addresses"  >
 
  <x-slot name="inputs">
    <x-form-select fname="city" bname="city"  display="name" icon="fa-solid fa-city" :options="$cities" value="name"  /> 
    <x-form-input  type="text" fname="Address" bname="address" icon="fa-solid fa-location-dot"/>
  </x-slot>

</x-app-modal>

