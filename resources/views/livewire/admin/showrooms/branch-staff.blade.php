<div>
    <x-app-table name=" List of showrooms staff ">

        <x-slot name="header">
       
          </x-slot>
          <x-slot name="head">
            <th class="col-1"> ID </th>
            <th class="col-1"> Created at</th>
            <th class="col-1"> Showroom</th>
            <th class="col-2"> Name</th>
            <th class="col-1"> Title </th>
            <th class="col-2"> email </th>
            <th class="col-2"> Phone </th>
           
          </x-slot>
          
          <x-slot name="body">
            @foreach($data as $key => $row)
            <tr>
               <td> {{$row->id}}</td>
               <td> {{$row->created_at}}</td>
               <td> {{$row->branch->name}}</td>
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
                
            </tr>
             @endforeach
            </x-slot>
        
            <x-slot name="footer">
             
            </x-slot>
            </x-app-table>
            
      
      
</div>
