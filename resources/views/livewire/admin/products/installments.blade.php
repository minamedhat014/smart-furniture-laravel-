<x-app-table name="  List of installment methods ">

  <x-slot name="header">
      <select  class="table-select" wire:model="statusFilter"> 
        <option value="desc"> Status filter </option>
            <option value="1"> Not Launched </option>
            <option value="2"> Active </option>
            <option value="3"> Deactive </option>
      </select>
  
<x-table-button icon="fa-solid fa-circle-plus" target="addModel" />
  </x-slot>
  
  <x-slot name="head">
    
    <th class="col-1">ID</th>
    <th class="col-1"> Created at</th>
    <th class="col-1"> Name</th>
    <th class="col-1"> Start from</th>
    <th class="col-1"> End at</th>
    <th class="col-1">  Status</th>
    <th class="col-1"> Remarks</th>
    <th class="col-1"> Created by </th>
    <th class="col-1"> Actions </th>

  </x-slot>
  
  <x-slot name="body">
    @foreach($data as $key => $row)
    <td class="col-1 ">{{$row->id}}</td>
    <td class="col-1">{{$row->created_at}}</td>
    <td class="col-1">{{$row->name}}</td>
    <td class="col-1">{{$row->start_from}}</td>
    <td class="col-1">{{$row->ends_at}}</td>
    <td>
      @if($row->status == 3)
      <span class="badge bg-danger"> Cancelled</span>
     @elseif($row->status == 1)
    <span class="badge bg-primary"> Not launched </span>
       @elseif($row->status == 2)
        <span class="badge bg-success">Standing </span>
        @endif
      </td>
      <td class="col-1">{{$row->remarks}}</td>
      <td class="col-1">{{$row->created_by}}</td>
            <td>
              <div>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  Actions
                </button>
                <div class="dropdown-menu">
                  <li><a href="{{route('installmentDetails',['id'=>$row->id])}}" class="dropdown-item" type="button" target="_blank"> <i class="fa-solid fa-add"></i> add installment Details </a></li>
                  <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editModel" wire:click="edit({{$row->id}})" type="button"  ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
                  <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#deleteModel" wire:click="deleteID({{$row->id}})" type="button"  ><i class="fa-solid fa-trash"></i> Remove </a> </li>
                  <li><a data-bs-toggle="modal" class="dropdown-item" wire:click="launch({{$row->id}})" type="button"  ><i class="fa-solid fa-play"></i> activate </a> </li>
                  <li><a data-bs-toggle="modal" class="dropdown-item" wire:click="suspend({{$row->id}})" type="button"  ><i class="fa-solid fa-ban"></i> suspend  </a> </li>
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
  
  
  

  








