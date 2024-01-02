<x-app-table name=" List of installations staff ">

    <x-slot name="header">
      @if($user_company_id !== 1)

      <x-table-button icon="fa-solid fa-circle-plus" target="AddInstallModal" />
      @endif
      </x-slot>
      <x-slot name="head">
        <th class="col-1"> ID </th>
        <th class="col-1"> Created at</th>
        <th class="col-2"> Name</th>
        <th class="col-2"> email </th>
        <th class="col-2"> Phone </th>
        <th class="col-1"> company </th>
        @if($user_company_id !== 1)
        <th class="col-2"> actions </th>
        @endif

      </x-slot>
      
      <x-slot name="body">
        @foreach($data as $key => $row)
        <tr>
           <td> {{$row->id}}</td>
           <td> {{$row->created_at}}</td>
           <td> {{$row->name}}</td>
            <td> {{$row->email}} </td>
            <td> {{$row->phone}} </td>
            <td> {{$row->company->name}} </td>
              @if($user_company_id !== 1)
              <td>
              <div>
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                  Actions
                </button>
                <div class="dropdown-menu">
                  <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editInstallModal" type="button" wire:click ="edit({{$row->id}})" ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
                <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#deleteInstallModel" type="button" wire:click ="deleteID({{$row->id}})" ><i class="fa-solid fa-trash"></i> Remove </a> </li>
                </div>
              </div>
          </td> 
          @endif
        </tr>
         @endforeach
        </x-slot>
    
        <x-slot name="footer">
          {{ $data->links() }}
          @include('livewire.admin.showrooms.installModal')
        </x-slot>
        </x-app-table>
        
  
  