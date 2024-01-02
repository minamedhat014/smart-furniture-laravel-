<x-app-table name=" List of Permissions ">

  <x-slot name="header">
  
<x-table-button icon="fa-solid fa-circle-plus" target="addPermissioneModal" />
  </x-slot>
  
  <x-slot name="head">
    
    <th class="col-3">ID</th>
    <th class="col-4"> Name</th>
    <th class="col-4"> guard name </th>
    <th class="col-3"> Actions </th>
  </x-slot>
  
  <x-slot name="body">
    @foreach($permissions as $permission)
                          <tr>
                          <td >{{$permission->id}}</td>
                          <td >{{$permission->name}}</td>
                          <td>{{$permission->guard_name}}</td>
                          <td> 
                            <a data-bs-toggle="modal" data-bs-target="#editPermissionModal" type="button" wire:click='edit({{$permission->id}})' class="btn btn-outline-secondary"><i class="fa-solid fa-pen-to-square"></i></a>
                              <a data-bs-toggle="modal" data-bs-target="#deletePermissionModel" type="button" class="btn btn-outline-secondary" wire:click='deleteID({{$permission->id}})'> <i class="fa-solid fa-trash danger"></i></a>
                                
                          </td>       
                        </tr>
                       
                        @endforeach  
  </x-slot>
  
  <x-slot name="footer">
    @include('livewire.admin.users.permissionModal')
    {{ $permissions->links() }} 
  
  </x-slot>
  </x-app-table>
  
  
  

  





