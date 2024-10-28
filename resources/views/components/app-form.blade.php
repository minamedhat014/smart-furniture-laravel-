

@props(['title','type'])

<div class="app-form">
  <form wire:submit="{{$type}}" autocomplete="off"  enctype="multipart/form-data">
    @csrf
 
    <div class="row justify-content-start col-12">
  
      {{$inputs}}

  

      <button type="button" class="btn btn-outline-secondary form-button col-lg-3 col-md-8 col-sm-12"  wire:click="closeModal" >Cancel</button>
      @php
      // Split the string into pieces based on the camel case
      $pieces = preg_split('/(?=[A-Z])/',$type, -1, PREG_SPLIT_NO_EMPTY);
      // Capitalize the initials of each piece
      $capitalizedPieces = array_map('ucfirst', $pieces);
      // Join the pieces back into a string
      $btnName = implode(' ', $capitalizedPieces);
      @endphp    
      <button type="submit" @if($errors->any()) disabled @endif class="btn btn-outline-success  form-button col-lg-3 col-md-8 col-sm-12"> {{$btnName}}</button>
      
    
    </div>                  
</form>
</div>
         
     