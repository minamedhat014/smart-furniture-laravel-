
<x-app-table name=" List of showroom products ">

    <x-slot name="header">
  
      </x-slot>
      <x-slot name="head">
        
        <th class="col-1">ID</th>
        <th class="col-1"> Created at</th>
        <th class="col-2">Showroom </th>
        <th class="col-2"> Product name</th>
        <th class="col-2"> Product type </th>
        <th class="col-1">  Displayed quantity </th>
        <th class="col-2"> Special offer </th>
        <th class="col-2"> remarks </th>
       
  
      </x-slot>
      
      <x-slot name="body">
         @foreach($data as $key => $row)
                      <tr>
                         <td> {{$row->id}}</td>
                         <td> {{$row->created_at}}</td>
                         <td> {{$row->showroom->name}}</td>
                         <td> {{$row->product->name}}</td>
                         <td> {{$row->product->type->name}}</td>
                          <td> {{$row->quantity}} </td>
                          <td> {{$row->special_offer}} </td>
                          <td> {{$row->remarks}} </td>
                          
                       @endforeach
      
      </x-slot>
      
      <x-slot name="footer">
        {{ $data->links() }}
      </x-slot>
      </x-app-table>
      
      
      
  
  
  