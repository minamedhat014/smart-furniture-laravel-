

<div>
    <x-app-table name="List of Policies and Procedures">
      <x-slot name="header">
        @can('write customer')
    <x-table-button icon="fa-solid fa-circle-plus" target="addModal" />
       @endcan
      </x-slot>
      
      <x-slot name="head">
        <th>Id</th>
        <th>Company </th>
        <th>Policy Name </th>
        <th>Polciy Description</th>
        <th>Created By </th>
        <th>Approved By</th>
        @can('write policy')
        <th> Actions </th>
        @endcan
      </x-slot>
      
      <x-slot name="body">
       
                               
        @foreach($this->policies as $key => $row)
        <tr >
          <td>{{ $row->id }}</td>
          <td>{{$row->company?->name}} </td>
          <td> {{$row->policy_name}}</td>
          <td> {{$row->policy_description}}</td>
          <td>{{displayCreatedBy($row->created_by)}}</td>
          <td>{{displayCreatedBy($row->approved_by)}}</td>
                <td>
                  <div>
                    <button type="button" class="btn btn-default dropdown-toggle custom-button" data-toggle="dropdown">
                   Actions
                    </button>
                    <div class="dropdown-menu">
                      <li><a data-bs-toggle="modal" data-bs-target="#editPolicyModal"  class="dropdown-item"  wire:click="edit({{$row->id}})" type="button"  ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
                      <li><a data-bs-toggle="modal" data-bs-target="#deletePolicyModal"  class="dropdown-item"  wire:click="gettingId({{$row->id}})" type="button"  ><i class="fa-solid fa-trash"></i> Remove </a> </li>
                      <li><a data-bs-toggle="modal" data-bs-target="#approvePolicyModal"  class="dropdown-item"  wire:click="gettingId({{$row->id}})" type="button"  ><i class="fa-solid fa-thumbs-up"></i> Approve </a> </li>
                      <li><a class="dropdown-item"  href="{{route('policy.preview',['id'=>$row->id])}}" target="_blank" type="button"  ><i class="fa-solid fa-eye"></i> Preview PDF</a> </li>
                    </div>
                </td> 
        </tr>
        @endforeach
    
      </x-slot>
      
      <x-slot name="footer">

        @include('livewire.admin.procedures.policyModal')
       
        {{ $this->policies->links() }} 
      

      </x-slot>
      </x-app-table>
      
      </div>
      
    
      
    
    
    
    
    