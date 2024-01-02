@php
    $name = App\Models\installment::where('id',$installment_id)->first();
    $installment_name = $name->name
  @endphp

<x-app-table name="{{$installment_name}}">

  <x-slot name="header">
  
    <x-table-select fname="Status filter" bname="statusFilter" 
    :options="[['id' => 1, 'name' => 'Not launched'],['id' => 2, 'name' => 'Active'],['id' => 3, 'name' => 'cancelled']]" value="id"/> 
<x-table-button icon="fa-solid fa-circle-plus" target="addModel" />
  </x-slot>
  
  <x-slot name="head">
    
    <th class="col-1"> Serial </th>
    <th class="col-1"> Bank name </th>
    <th class="col-1"> maximaum months of installments </th>
    <th class="col-1"> Months without intrest</th>
    <th class="col-1"> status </th>
    <th class="col-1"> Percentage of admin fees </th>
    <th class="col-1"> Percentage on factory </th>
    <th class="col-1"> Percentage on distributor </th>
    <th class="col-2"> Remarks </th>
    <th> Actions </th>

  </x-slot>
  
  <x-slot name="body">
     @foreach($data as $row)
                                 <tr>
                                  @php
                                  $i=0;
                                  $i++;
                                @endphp

                                   <td> {{$i}}</td>
                                   <td> {{$row->bank_name}}</td>
                                   <td> {{$row->max_months_installments}}</td>
                                   <td> {{$row->months_without_intrest}}</td>
                                   <td>
                                    @if($row->status == 1)
                                    <span class="badge bg-primary"> not active</span>
                                   @elseif($row->status== 2)
                                  <span class="badge bg-success"> active </span>
                                  @elseif($row->status== 3)
                                  <span class="badge bg-danger"> deactive </span>
                                      @endif
                                    </td>

                                   <td> {{$row->percentage_of_admin_fees}}%</td>
                                  
                                   <td> {{$row->factory_intrest}}%</td>
                                   <td> {{$row->branch_intrest}}%</td>
                                   <td> {{$row->remarks}}</td>
                                       <td>
                                         <div>
                                           <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                             Actions
                                           </button>
                                           <div class="dropdown-menu">
                                            
                                             <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editModel" wire:click="edit({{$row->id}})" type="button"  ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
                                             <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#deleteModel" wire:click="deleteID({{$row->id}})" type="button"  ><i class="fa-solid fa-trash"></i> Remove </a> </li>
                                             <li><a data-bs-toggle="modal" class="dropdown-item"  wire:click="suspend({{$row->id}})" type="button"  ><i class="fa-solid fa-ban"></i> Deactive </a> </li>
                                             <li><a data-bs-toggle="modal" class="dropdown-item"  wire:click="reactive({{$row->id}})" type="button"  ><i class="fa-solid fa-rotate-right"></i> Reactive </a> </li>
                                           </div>
                                         </div>
                                       </td> 
                               </tr>
                               @endforeach   
  </x-slot>
  
  <x-slot name="footer">
    @include('livewire.admin.products.installmentDetailsModal')
    {{ $data->links() }} 
  </x-slot>
  </x-app-table>
  
  
  

  



