@props(['fname', 'bname','options','value'])


  <select  class="table-select" wire:model='{{$bname}}'> 
  <option value=""> {{$fname}}</option>
    @foreach( $options as $key => $row)
      <option value="{{$row[$value]}}"> {{$row['name']}}</option>
    @endforeach
  </select>
