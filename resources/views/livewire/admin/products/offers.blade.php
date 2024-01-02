
<x-app-table name="List of offers">
  <x-slot name="header"> 
    <x-table-select fname="Status filter" bname="statusFilter" 
    :options="[['id' => 1, 'name' => 'Not launched'],['id' => 2, 'name' => 'Active'],['id' => 3, 'name' => 'cancelled']]" value="id"/> 
    
<x-table-button icon="fa-solid fa-circle-plus" target="addoffersModel" />

  </x-slot>
  
  <x-slot name="head">
    
    <th class="col-1">ID</th>
    <th class="col-1"> Created at</th>
    <th class="col-1"> Name</th>
    <th class="col-1"> Start date</th>
    <th class="col-1"> End date</th>
    <th class="col-1"> offer type </th>
    <th class="col-1"> product types </th>
    <th class="col-1"> status </th>
    <th class="col-1"> Requirments</th>
    <th class="col-1"> Remarks</th>
    <th class="col-1"> applied on </th>
    <th class="col-1"> Not applied on </th>
    <th class="col-1"> Actions </th>

  </x-slot>
  
  <x-slot name="body">

    @foreach($data as $row)
    <tr>
      <td> {{$row->id}}</td>
      <td> {{$row->created_at}}</td>
      <td> {{$row->name}}</td>
      <td> {{$row->start_date}}</td>
      <td> {{$row->end_date}}</td>
    <td> {{$row->typeOffer->name}}</td>
      <td> 
        @foreach($row->product_types as $pro )
        {{$pro ." "." ,"}}
        @endforeach
      </td>
      

      <td>
      @if($row->status == 1)
      <span class="badge bg-primary"> not Launched</span>
     @elseif($row->status== 2)
    <span class="badge bg-success"> active </span>
    @elseif($row->status== 3)
    <span class="badge bg-danger"> deactive </span>
        @endif
      </td>
      <td> {{$row->requirments}}</td>
      <td> {{$row->remarks}} </td>
      <td> {{$row->applied_on}} </td>
      <td> {{$row->not_applied_on}} </td>
          <td>
            <div>
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                Actions
              </button>
              <div class="dropdown-menu">
                <li><a href="{{route('offerDetails',['id'=>$row->id])}}" class="dropdown-item" type="button" target="_blank"> <i class="fa-solid fa-add"></i> add offer Details </a></li>
                <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editoffersModel" wire:click="edit({{$row->id}})" type="button"  ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
                <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#deleteoffersModel" wire:click="deleteID({{$row->id}})" type="button"  ><i class="fa-solid fa-trash"></i> Remove </a> </li>
                <li><a data-bs-toggle="modal" class="dropdown-item" wire:click="launch({{$row->id}})" type="button"  ><i class="fa-solid fa-play"></i> activate offer </a> </li>
                <li><a data-bs-toggle="modal" class="dropdown-item" wire:click="suspend({{$row->id}})" type="button"  ><i class="fa-solid fa-ban"></i> deactivate offer </a> </li>
              </div>
            </div>
          </td> 
  </tr>
  @endforeach   

  </x-slot>
  
  <x-slot name="footer">
    @include('livewire.admin.products.offersModal')
    {{ $data->links() }} 
  </x-slot>
  </x-app-table>
  
  
  

  














