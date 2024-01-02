@props(['fname', 'bname','icon','options','value'])

<div class="col-lg-4 col-md-8 col-sm-12">
    <div class="feild-malti">
    <label for="{{$bname}}" class="muti-label" > {{$fname}} </label>
    <i class="{{$icon}} muti-icon "></i>
   <div wire:ignore.self >  
    <select data-pharaonic="select2" name="{{$bname}}" @if($errors->has($bname))style=" box-shadow: 1px 3px 5px #f54747;" @endif data-clear multiple data-component-id="{{ $this->id }}" data-placeholder="you can select more than a value"
      wire:model.defer="{{$bname}}">
        @foreach($options as  $option)
        <option value="{{$option->$value}}" > {{$option->$display}}</option>
        @endforeach
      </select>             
    </div>
  </div> 
  @if($errors->has($bname))
  <span class="feild span">{{ $errors->first($bname) }}</span>
  @endif
</div>