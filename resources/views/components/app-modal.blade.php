

@props(['id', 'title','type'])

<div  wire:ignore.self class="modal fade" id="{{$id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  @if(Str::startsWith($type, 'store') ||Str::startsWith($type, 'assign') ||Str::startsWith($type, ' ') ||Str::startsWith($type, 'update') ||Str::startsWith($type, 'run') || Str::startsWith($type, 'upload')|| Str::startsWith($type, 'add')|| Str::startsWith($type, 'select')) modal-xl  @else modal-dialog-centered @endif">
      <div class="modal-content ">
        <div class="modal-header "> 
          <p class="modal-title fs-5" id="{{$id}}">{{$title}}</p>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="closeModal"></button>
        </div>
        <div class="modal-body">
          <form wire:submit="{{$type}}" autocomplete="off"  enctype="multipart/form-data">
            @csrf
         
            <div class="row justify-content-start col-12">
          
              {{$inputs}}
              
            </div>                   
        </div>
        <div class="modal-footer ">
          
  
        {{-- <button type="button" class="btn btn-outline-danger" wire:dirty >Unsaved changes...</button> --}}
        <button type="button" class="btn btn-outline-secondary  modal-button" data-bs-dismiss="modal" wire:click="closeModal">close</button>
        <button type="button" class="btn btn-outline-secondary" id="modalBtnClose" data-bs-dismiss="modal" hidden>close</button>
        @php
// Split the string into pieces based on the camel case
$pieces = preg_split('/(?=[A-Z])/',$type, -1, PREG_SPLIT_NO_EMPTY);
// Capitalize the initials of each piece
$capitalizedPieces = array_map('ucfirst', $pieces);
// Join the pieces back into a string
$btnName = implode(' ', $capitalizedPieces);
        @endphp
        <button type="submit" @if($errors->any()) disabled @endif class="btn btn-outline-success modal-button @if(Str::startsWith($type, 'delete')) btn-outline-danger @endif"   @if($type !== 'store' && $type !=='update') data-bs-dismiss="modal" @endif > {{$btnName}}</button>
        </div>

        </form>
      </div>
    </div>
  </div>