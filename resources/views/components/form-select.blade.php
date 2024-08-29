@props(['fname', 'bname','icon','options','value','display'])

<div class="feild col-lg-4 col-md-8 col-sm-12">
    <label for="{{$bname}}">  {{ucfirst($fname)}}  <span {{ $attributes->merge(['class' => ''])}}> </span></label>
    <i class="{{$icon}}"></i>
    <select name="{{$bname}}"  id="{{$bname}}" class="feild-select" @if($errors->has($bname))style=" box-shadow: 1px 3px 5px #f54747;" @endif   data-placeholder="{{$fname}}"
        wire:model.live ="{{$bname}}">
        <option value="" > select </option>
          @foreach($options as  $option)
          <option value="{{$option[$value]}}" >   {{$option[$display]}} </option>
          @endforeach
        </select>             
        @if($errors->has($bname))
        <span class="feild-span">{{ $errors->first($bname) }}</span>
        @endif
 </div>

