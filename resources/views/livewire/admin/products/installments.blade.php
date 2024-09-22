<div>
<x-app-table name="  List of installment methods ">

  <x-slot name="header">
      <select  class="table-select" wire:model.live="statusFilter"> 
        <option value="desc"> Status filter </option>
            <option value="1"> Not Launched </option>
            <option value="2"> Active </option>
            <option value="3"> Deactive </option>
      </select>

  @can('write installment')
<x-table-button icon="fa-solid fa-circle-plus" target="addModel" />
   @endCan

  </x-slot>
  
  <x-slot name="head">
    
    <th>ID</th>
    <th > Name</th>
    <th > Bank name </th>
    <th> maximaum months of installments </th>
    <th> Months without intrest</th>
    <th> status </th>
    <th> Percentage of admin fees </th>
    <th> Percentage on factory </th>
    <th> Percentage on distributor </th>
    <th> Start from</th>
    <th> End at</th>
    <th> Remarks</th>
    <th> Actions </th>
  </x-slot>
  
  <x-slot name="body">
    @foreach($data as $key => $row)
    <td>{{$row->id}}</td>
    <td>{{$row->name}}</td>
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
    <td >{{$row->start_from}}</td>
    <td >{{$row->ends_at}}</td>
      <td >{{$row->remarks}}</td>
      
              <td>
              <div>
                <button type="button" class="btn btn-default dropdown-toggle custom-button" data-toggle="dropdown">
                  Actions
                </button>
                <div class="dropdown-menu">
                  @can('write installment')
                  <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#addModel" type="button" wire:click='edit({{$row->id}})' ><i class="fa-solid fa-copy"></i> Copy to new </a> </li>
                  <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editModel" wire:click="edit({{$row->id}})" type="button"  ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
                  <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#deleteModel" wire:click="deleteID({{$row->id}})" type="button"  ><i class="fa-solid fa-trash"></i> Remove </a> </li>
                  <li><a data-bs-toggle="modal" class="dropdown-item" wire:click="launch({{$row->id}})" type="button"  ><i class="fa-solid fa-play"></i> activate </a> </li>
                  <li><a data-bs-toggle="modal" class="dropdown-item" wire:click="suspend({{$row->id}})" type="button"  ><i class="fa-solid fa-ban"></i> suspend  </a> </li>
                  @endCan
                </div>
              </div>
            </td>
           
    </tr>
    @endforeach
  </x-slot>
  
  <x-slot name="footer">
    @include('livewire.admin.products.installmentModal')
    @if($data)
    {{ $data->links() }} 
    @endif
  </x-slot>
  </x-app-table>
  
  
  </div>

  








