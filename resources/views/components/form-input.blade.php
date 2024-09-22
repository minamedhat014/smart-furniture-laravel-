
@props(['fname', 'bname','icon','type'])

<div class="feild col-lg-4 col-md-8 col-sm-12">
    <label for="{{$bname}}">  {{ucfirst($fname)}}  <span {{ $attributes->merge(['class' => ''])}}> </span></label> 
    <i class="{{$icon}}"></i>
    <input type="{{$type}}" class="feild-input" name="{{$bname}}" id="{{$bname}}"  placeholder="{{ucfirst($fname)}}"  @if($errors->has($bname))style=" box-shadow: 1px 3px 5px #f54747;" @endif wire:model.blur="{{$bname}}" >
    @if($errors->has($bname))
    <span class="feild-span">{{ $errors->first($bname) }}</span>
    @endif
 </div>