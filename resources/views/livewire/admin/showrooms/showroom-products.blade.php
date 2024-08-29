<div>
@php
  $name=App\Models\showroom::where('id',$showRoom_id)->first()->name;
@endphp 

<x-app-table name=" List of {{$name}} products ">

  <x-slot name="header">
    @can('showroom products')
  <x-table-button icon="fa-solid fa-circle-plus" target="AddshowProductModal" />
   @endcan
    </x-slot>
    <x-slot name="head">
      
      <th class="col-2">ID</th>
      <th class="col-2"> Created at</th>
      <th class="col-2"> Product name</th>
      <th class="col-2"> Quantity </th>
      <th class="col-2"> Special offer </th>
      <th class="col-2"> remarks </th>
      @can('showroom products')
      <th class="col-2"> Actions </th>
      @endcan

    </x-slot>
    
    <x-slot name="body">
       @foreach($data as $key => $row)
                    <tr>
                       <td> {{$row->id}}</td>
                       <td> {{$row->created_at}}</td>
                       <td> {{$row->product?->name}}</td>
                        <td> {{$row->quantity}} </td>
                        <td> {{$row->special_offer}} </td>
                        <td> {{$row->remarks}} </td>
                        <td>
                          @can('showroom products')
                          <div>
                            <button type="button" class="btn btn-default dropdown-toggle custom-button" data-toggle="dropdown">
                              Actions
                            </button>
                            <div class="dropdown-menu">
                              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editshowProductModal" type="button" wire:click ="edit({{$row->id}})" ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
                              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#deletshowProductModel" type="button" wire:click ="deleteID({{$row->id}})" ><i class="fa-solid fa-trash"></i> Remove </a> </li>
                            </div>
                          </div>
                      </td> 
                      @endcan

                    </tr>
                     @endforeach
    
    </x-slot>
    
    <x-slot name="footer">
      @include('livewire.admin.showrooms.showroom-productsModal')
      {{ $data->links() }}
    </x-slot>
    </x-app-table>
    
    </div>
    


