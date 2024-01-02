<x-app-table name=" List of product updates ">

  <x-slot name="header">
<x-table-select fname="Select Reason" bname="ReasonFilter" :options="$reasons" value="id"/>
<x-table-select fname="Select product" bname="productFilter" :options="$products" value="id"/>
<x-table-button icon="fa-solid fa-circle-plus" target="addversionModel"/>
  </x-slot>
  
  <x-slot name="head">
    
      <th class="col-1">ID</th>
      <th class="col-2"> Created at</th>
      <th class="col-1"> Product type</th>
      <th class="col-1"> product source</th>
      <th class="col-2"> Update summary </th>
      <th class="col-2"> updated codes </th>
      <th class="col-1"> product name</th>
      <th class="col-2"> Reason </th>
      <th class="col-1"> created by</th>
      <th class="col-1"> Actions </th>

  </x-slot>
  
  <x-slot name="body">

   @foreach($data as $row)
                              <tr>
                                <td> {{$row->id}}</td>
                                <td> {{$row->created_at}}</td>
                                <td> {{$row->products->type->name}}</td>
                                <td> {{$row->products->source->name}}</td>
                                <td> {{$row->version_summary}}</td>
                                <td>
                                  @foreach($row->items_code as $item )
                                  {{$item ." "." ,"}}
                                  @endforeach
                                </td>
                                <td> {{$row->products->name}}</td>
                                <td> {{$row->reasons->name}}</td>
                                <td> {{$row->created_by}} </td>
                                
                                    <td>
                                      <div>
                                        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                          Actions
                                        </button>
                                        <div class="dropdown-menu">
                                          <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editVersionsModel" wire:click="edit({{$row->id}})" type="button"  ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
                                          <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#deleteVersionsModel" wire:click="deleteID({{$row->id}})" type="button"  ><i class="fa-solid fa-trash"></i> Remove </a> </li>
                                          <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#imageVersionsModel"   type="button" ><i class="fa-solid fa-file-invoice"></i> Version documents </a> </li>
                                        </div>
                                      </div>
                                    </td> 
                            </tr>
                            @endforeach   
  </x-slot>
  
  <x-slot name="footer">
    @include('livewire.admin.products.productUpdateModal')
    {{ $data->links() }} 
  </x-slot>
  </x-app-table>
  














