
@props(['fname', 'bname'])

<div class="col-lg-4 col-md-8 col-sm-12">
  <div class="feild ">
    <a id="uploadfile" wire:click="save"> </a>
    <label >{{$fname}}  <span {{ $attributes->merge(['class' => ''])}}> </span> </label>
    <i class="fa-solid fa-file"></i>
    <input type="file" class="feild-photo"  placeholder="select file"  id="{{ rand() }}".  id="photoinput" wire:model.live="{{$bname}}" @if($bname === 'files')  multiple @endif>
    @if($errors->has($bname))
    <span class="feild span">{{ $errors->first($bname) }}</span>
    @endif
 </div> 
</div> 
<div>
  {{$preview}}
</div> 
 
