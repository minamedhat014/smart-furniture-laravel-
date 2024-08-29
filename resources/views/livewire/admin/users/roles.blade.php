
<div>

<x-app-table name=" List of Roles ">

  <x-slot name="header">

  @can('write user')
  <x-table-button icon="fa-solid fa-circle-plus" target="addRoleModal" />
 @endcan

  </x-slot>
  
  <x-slot name="head">
    
    <th class="col-1">ID</th>
    <th class="col-2"> Name</th>
    <th class="col-7"> Permissions for this role</th>
    @can('write user')
    <th class="col-2"> Actions </th>
    @endcan
  </x-slot>
  
  <x-slot name="body">
    @foreach($roles as $role)
                          <tr>
                          <td>{{$role->id}}</td>
                          <td>{{$role->name}}</td>
                          <td>
                         @foreach ($role->permissions as $permission )
                         <span class="badge bg-primary"> {{$permission->name}}</span>
                         @endforeach
                          </td>
                          @can('write user')
                          <td> 
                            <div>
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                Actions
                              </button>
                              <div class="dropdown-menu">
                              <li> <a data-bs-toggle="modal" data-bs-target="#editRoleModal" type="button" wire:click='edit({{$role->id}})' class="dropdown-item"><i class="fa-solid fa-pen-to-square"></i> Edit Role</a> </li> 
                               <li> <a data-bs-toggle="modal" data-bs-target="#deleteRoleModel" type="button"   class="dropdown-item" wire:click='deleteID({{$role->id}})'> <i class="fa-solid fa-trash danger"></i> Remove Role</a></li>       
                               <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#assignPermission" type="button" wire:click='RoleID({{$role->id}})' >  <i class="fa-solid fa-user-lock"></i> Assign Permissions </a></li>
                               <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#syncPermission" type="button" wire:click='RoleID({{$role->id}})' >  <i class="fa-solid fa-user-lock"></i> sync Permissions </a></li>
                              </div>
                            </div>
                          </td>  
                            @endcan
      
                            </tr> 
                        @endforeach  
  </x-slot>
  
  <x-slot name="footer">
    @include('livewire.admin.users.rolesModal')
    {{ $roles->links() }} 
  
  </x-slot>
  </x-app-table>
  

</div>