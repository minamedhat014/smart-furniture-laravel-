<div>
@php
  $name=App\Models\showroom::where('id',$branch_id)->first()->name;
@endphp

<x-app-table name=" List of {{$name}} staff">

  <x-slot name="header">
  <x-table-button icon="fa-solid fa-circle-plus" target="AddNewStaffModal" />
    </x-slot>
    <x-slot name="head">
      <th class="col-2"> ID </th>
      <th class="col-2"> Created at</th>
      <th class="col-2"> Name</th>
      <th class="col-2"> Title </th>
      <th class="col-2"> email </th>
      <th class="col-2"> Phone </th>
      <th class="col-2"> Actions </th>
    </x-slot>
    
    <x-slot name="body">
      @foreach($data as $key => $row)
      <tr>
         <td> {{$row->id}}</td>
         <td> {{$row->created_at}}</td>
         <td> {{$row->sales_name}}</td>
         <td>
          @if($row->title == 0)
          <span class="badge bg-warning"> Sales</span>
          @elseif($row->title == 1)
          <span class="badge bg-primary"> Designer </span>
          @elseif($row->title == 2)
          <span class="badge bg-success">branch manager</span>
          @elseif($row->title == 3)
          <span class="badge bg-dark">Area manager</span>
          @endif
         </td>
    
          <td> {{$row->email}} </td>
          <td> {{$row->phone}} </td>
          <td>
            <div>
              <button type="button" class="btn btn-default dropdown-toggle custom-button" data-toggle="dropdown">
                Actions
              </button>
              <div class="dropdown-menu">
                <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editTeamModal" type="button" wire:click ="edit({{$row->id}})" ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
              <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#deleteteamModel" type="button" wire:click ="deleteID({{$row->id}})" ><i class="fa-solid fa-trash"></i> Remove </a> </li>
              </div>
            </div>
        </td> 
      </tr>
       @endforeach
      </x-slot>
  
      <x-slot name="footer">
        @include('livewire.admin.showrooms.teamsModal')
      </x-slot>
      </x-app-table>
      
</div>
