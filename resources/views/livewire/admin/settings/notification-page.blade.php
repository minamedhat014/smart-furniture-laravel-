<div>
<x-app-table name=" List of Notifications ">
  <x-slot name="header">

  </x-slot>
  
  <x-slot name="head">
    
    <th>created at </th>
    <th>Media</th>
    <th>created by </th>
    <th>Notification</th>
    <th>More deatils</th>

  </x-slot>
  
  <x-slot name="body">
   
                           
    @foreach($data as $key => $row)
                                    <tr>
                                 <td> {{$row->created_at}}</td>
                                 <td> 
                                    <div class="media">
                                    <img src="{{$row->data['image']}}" alt="notification Image" class="noti-image">
                                    <div class="media-body"> 
                                    </td>
                                <td>{{$row ->data['by']}} </td>
                                <td>{{$row ->data['title']}}</td>
                                <td> <a href=" {{$row ->data['url']}}" class="ml-4"> <i class="fa-solid fa-eye"></i></td>
                                    </tr>
                                 @endforeach   

  </x-slot>
  
  <x-slot name="footer">
    {{ $data->links() }} 
  </x-slot>
  </x-app-table>
  
  </div>
  




