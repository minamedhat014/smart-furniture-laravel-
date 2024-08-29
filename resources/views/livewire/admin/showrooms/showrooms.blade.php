<div>
<x-app-table name=" List of showrooms ">

<x-slot name="header">
  @can('write showroom')
<x-table-button icon="fa-solid fa-circle-plus" target="AddshowroomModal" />
   @endcan

  </x-slot>
  <x-slot name="head">
    
                               <th class="col-2">ID</th>
                              <th class="col-2"> Created at</th>
                              <th class="col-2"> Name</th>
                              <th class="col-2"> working time</th>
                              <th class="col-2"> Loacation</th>
                              <th class="col-2"> Status</th>
                              <th class="col-2"> Company </th>
                              <th class="col-2"> Phone </th>
                              <th scope='col'> Actions </th>
  </x-slot>
  
  <x-slot name="body">
    @foreach($data as  $row)
                              <tr>
                             <td> {{$row->id}}</td>
                             <td> {{$row->created_at}}</td>
                             <td> {{$row->name}}</td>
                            
                             <td>  <span class="badge bg-secondary"> {{$row->working_from}} - {{$row->working_to}} </span> </td>
                             <td> {{$row->location}}</td>
                             @if($row->status ==1)
                             <td>  <span class="badge bg-success"> Running </span></td>
                             @endif
                             @if($row->status ==0)
                             <td>  <span class="badge bg-danger"> Closed </span></td>
                             @endif
                             <td> {{$row->company->name}}</td>
                             <td> {{$row->phone}}</td>
                              <td>
                                <div>
                                  <button type="button" class="btn btn-default dropdown-toggle custom-button" data-toggle="dropdown">
                                    Actions
                                  </button>
                                  <div class="dropdown-menu">
                                    @can('write showroom')
                                    <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editshowroomModel" type="button" wire:click ="edit({{$row->id}})" ><i class="fa-solid fa-pen-to-square"></i> Edit showroom </a> </li>
                                    <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#deleteShowroomModel" type="button" wire:click =" deleteID({{$row->id}})" ><i class="fa-solid fa-trash"></i> Remove showroom </a> </li>
                                    <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#closeShowroomModal" type="button" wire:click =" getshow_id({{$row->id}})" ><i class="fa-solid fa-shop-lock"></i> close showroom </a> </li>
                                    @endcan
                                    @can('showroom staff')
                                    <li><a href="{{route('showStaff.index',$row->id)}}" class="dropdown-item" ><i class="fa-solid fa-people-group"></i> showroom staff </a> </li>
                                    @endcan
                                    @can('showroom products')
                                    <li><a  href="{{route('showroomProducts.index',$row->id)}}" class="dropdown-item" type="button"  ><i class="fa-brands fa-product-hunt"></i> showroom  products </a> </li>
                                    @endcan
                                  </div>
                                </div>
                              </td> 
                            </tr>
                              @endforeach
  </x-slot>
  
  <x-slot name="footer">
    @include('livewire.admin.showrooms.showroomModel')
    {{ $data->links() }}
  </x-slot>
  </x-app-table>
  
  </div>
  

  

