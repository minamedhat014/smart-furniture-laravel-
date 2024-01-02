<div>
    <x-appToaster/>
    <div class="row">
      @include('livewire.admin.settings.dropListModal')
      <div class="feild col-4">
        <label for=""> please select list to be displayed </label>
        <i class="fa-solid fa-filter"> </i>
        <select type="text" class="feild-select"   required  wire:model.live="selected_list">
        @php
          $lists = \App\Models\dropdownLists::all();
        @endphp
              <option value="">select</option>
       @foreach($lists as $key => $list)
 
        <option value="{{$list->model_namespace}}">{{$list->name}}</option>
       @endforeach    
        </select>
        @error('selected_list') <span class="feild span" >{{ $message }}</span> @enderror
      </div>   
      <div class="col-3 mt-5">
        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
          Actions
        </button>
        <div class="dropdown-menu">
          <li><a wire:click="selected()" type="button" class="dropdown-item"><i class="fa-solid fa-eye"></i> Show this list </a> </li>
          <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#addDropdownMoadel" type="button" ><i class="fa-solid fa-plus"></i> Add new dropdown list </a> </li>
         
        </div>
      </div>
      

 @if($selected_list)
    @php
       $name=null;
       $name= App\Models\dropdownLists::where('model_namespace',$table_name)->pluck('name')->first();
       @endphp   



<h6 class="ml-5"> {{$name}}</h6>

      <div class="row col-6 ml-5">
      <table id="example1" class="table-light table-hover table-sm table-bordered ml-5" >
        <thead class="custom-table-header" >
        <tr >
          <th scope='col'>ID</th>  
          <th scope='col'> Name</th>  
          <th scope='col'> Created at </th>   
          <th scope='col'> Actions </th>
        </tr>
        </thead>
        <tbody class="custom-table-body">
          @foreach($data as $row)

          <tr>
          <td>{{$row->id}}</td>
          <td>{{$row->name}}</td>
          <td>{{$row->created_at}}</td>
          <td>
            @if($selected_list)
            <div>
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                Actions
              </button>
              <div class="dropdown-menu">
                <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#addModel" type="button" ><i class="fa-solid fa-plus"></i> Add this list </a> </li>
                <li><a data-bs-toggle="modal" class="dropdown-item" data-bs-target="#editModel" type="button" wire:click='edit({{$row->id}})' ><i class="fa-solid fa-pen-to-square"></i> Edit </a> </li>
                <li><a data-bs-toggle="modal" class="dropdown-item"data-bs-target="#deleteModel" type="button"  wire:click='deleteID({{$row->id}})'> <i class="fa-solid fa-trash danger"></i> Remove</a></li>
              </div>
            </div>
            @endif
          </td> 
        </tr>
        @endforeach   
        </tbody>
          <tfoot>
           
          </tfoot>
        </table>
        </div>
        @endif

    
    </div>



    

        
    





</div>
