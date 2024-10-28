@props(['fname', 'bname','icon','options','value'])

<div class="col-lg-3 col-md-8 col-sm-12">
    <div class="feild-malti">
    <label for="{{$bname}}" class="muti-label" > {{ucfirst($fname)}}  <span {{ $attributes->merge(['class' => ''])}}> </span> </label>
    <i class="{{$icon}} muti-icon "></i>
   <div wire:ignore >  
    <select data-pharaonic="select2"  multiple data-clear  data-component-id="{{ $this->getId() }}" name="{{$bname}}" @if($errors->has($bname))style=" box-shadow: 1px 3px 5px #f54747;" @endif multiple 
       wire:model = "{{$bname}}" > 
        @foreach($options as  $option)
        <option value="{{$option[$value]}}"  >   {{$option[$display]}} </option>
        @endforeach
      </select>             
    </div>
  </div> 
  @if($errors->has($bname))
  <span class="feild-span">{{ $errors->first($bname) }}</span>
  @endif
</div>
