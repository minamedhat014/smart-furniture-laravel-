@props(['fname', 'bname'])

  <div class="feild col-4">
    <a id="upload" wire:click="save"> </a>
    <label >{{$fname}} </label>
    <i class="fa-solid fa-image"></i>
    <input type="file" class="feild-photo"  placeholder="select image"  id="{{ rand() }}".  id="photoinput" wire:model="{{$bname}}"  @if($bname === 'photos')  multiple @endif>
    @if($errors->has($bname))
    <span class="feild span">{{ $errors->first($bname) }}</span>
    @endif
 </div> 
 <div>
 {{$preview}}
</div> 



