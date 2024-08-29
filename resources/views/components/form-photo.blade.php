@props(['fname', 'bname'])

<div class="col-lg-4 col-md-8 col-sm-12">
  <div class="feild ">
    <a id="uploadPhoto" wire:click="save"> </a>
    <label >{{$fname}}  <span {{ $attributes->merge(['class' => ''])}}> </span> </label>
    <i class="fa-solid fa-image"></i>
    <input type="file" class="feild-photo"  placeholder="select image"  id="{{ rand() }}".  id="photoinput" wire:model.live="{{$bname}}"  @if($bname === 'photos')  multiple @endif>
    @if($errors->has($bname))
    <span class="feild span">{{ $errors->first($bname) }}</span>
    @endif
 </div> 
</div> 
 <div>
 {{$preview}}
</div> 



