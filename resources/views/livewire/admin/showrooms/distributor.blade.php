
<x-app-table name=" List of Destributors ">
  <x-slot name="header">
    <x-table-button icon="fa-solid fa-circle-plus" target="addDistModel" />
  </x-slot>
  
  <x-slot name="head">
    
    <th class="col-2">ID</th>
    <th class="col-4">Name</th>
    <th class="col-4">created by </th>
    <th class="col-6">Actions</th>
    

  </x-slot>
  
  <x-slot name="body">
   
    @foreach($data as $row)
    <tr>
    <td>{{$row->id}}</td>
    <td>{{$row->name}}</td>
    <td>{{$row->created_at}}</td>
    <td> 
      <a data-bs-toggle="modal" data-bs-target="#editDistModel" type="button" wire:click='editDist({{$row->id}})' class="btn btn-outline-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
        <a data-bs-toggle="modal" data-bs-target="#deleteDistModel" type="button" class="btn btn-outline-secondary" wire:click='deleteID({{$row->id}})'> <i class="fa-solid fa-trash danger"></i></a>
          
    </td>       
  </tr>
 
  @endforeach  

  </x-slot>
  
  <x-slot name="footer">
    @include('livewire.admin.showrooms.distributorModel')
    {{ $data->links() }} 
  </x-slot>
  </x-app-table>
  
  
  






