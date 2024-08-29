<div>
    <x-app-table name=" List of System Activity logs">
      <x-slot name="header">
    
      </x-slot>
      
      <x-slot name="head">
        
        <th class="col-1"> Uder ID </th>
        <th class="col-1"> Event </th>
        <th class="col-2"> Model </th>
        <th class="col-2"> causer type </th>
        <th class="col-2"> changes </th>
        <th class="col-1"> created at</th>
    
      </x-slot>
      
      <x-slot name="body">
       
                               
        @foreach($data as $key => $row)
                                        <tr>
                                            <td>{{$row->causer_id}}</td>
                                            <td>{{$row->description}}</td>
                                            <td>{{$row->subject_type}}</td>
                                            <td>{{$row->causer_type}}</td>
                                            <td>{{$row->changes}}</td>
                                            <td>{{$row->created_at}}</td>
                                        </tr>
                                     @endforeach   
    
      </x-slot>
      
      <x-slot name="footer">
        {{ $data->links() }} 
      </x-slot>
      </x-app-table>
      
      </div>
      
    
    
    
    
    