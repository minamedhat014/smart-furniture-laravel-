<!-- add Modal -->


<x-app-modal id="addModel" type="store" title=" Add installments">

  <x-slot name="inputs">
    <x-form-input  type="text" fname="Name" bname="name" icon="fa-solid fa-shield-heart" />
    <x-form-select fname="Bank name" display="name" bname="bank_name" icon="fa-solid fa-building-columns" :options="$banks" value="name" /> 
    <x-form-input  type="text" fname="Maximaum months for installments" bname="max_months_installments" icon="fa-solid fa-stopwatch" />
    <x-form-input  type="text" fname="Months without intrests" bname="months_without_intrest" icon="fa-solid fa-stopwatch" />
    <x-form-input  type="text" fname="Admin fees" bname="percentage_of_admin_fees" icon="fa-solid fa-comment-dollar" />
    <x-form-input  type="text" fname="Factory intrest" bname="factory_intrest" icon="fa-solid fa-comment-dollar" />
    <x-form-input  type="text" fname="Distributors intrest" bname="branch_intrest" icon="fa-solid fa-comment-dollar" />
    <x-form-input  type="date" fname="Start Date " bname="start_from" icon="fa-solid fa-calendar" /> 
    <x-form-input  type="date" fname="End Date " bname="ends_at" icon="fa-solid fa-calendar" /> 
    <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
  </x-slot>
</x-app-modal>
 
<!--  Edit Modal -->
<x-app-modal id="editModel" type="update" title=" Edit installments">

  <x-slot name="inputs">
    <x-form-input  type="text" fname="Name" bname="name" icon="fa-solid fa-shield-heart" />
    <x-form-select fname="Bank name" display="name" bname="bank_name" icon="fa-solid fa-building-columns" :options="$banks" value="name" /> 
    <x-form-input  type="text" fname="Maximaum months for installments" bname="max_months_installments" icon="fa-solid fa-stopwatch" />
    <x-form-input  type="text" fname="Months without intrests" bname="months_without_intrest" icon="fa-solid fa-stopwatch" />
    <x-form-input  type="text" fname="Admin fees" bname="percentage_of_admin_fees" icon="fa-solid fa-comment-dollar" />
    <x-form-input  type="text" fname="Factory intrest" bname="factory_intrest" icon="fa-solid fa-comment-dollar" />
    <x-form-input  type="text" fname="Distributors intrest" bname="branch_intrest" icon="fa-solid fa-comment-dollar" />
    <x-form-input  type="date" fname="Start Date " bname="start_from" icon="fa-solid fa-calendar" /> 
    <x-form-input  type="date" fname="End Date " bname="ends_at" icon="fa-solid fa-calendar" /> 
    <x-form-input  type="text" fname="Remarks" bname="remarks" icon="fa-solid fa-comment" />
  </x-slot>
</x-app-modal>

   
<!--  delete Modal -->

<x-app-modal id="deleteModel" type="delete" title=" Delete installments">
  <x-slot name="inputs">
    <p class="text-danger"> are you sure you want to delete this record ? </p>
  </x-slot>
</x-app-modal>
