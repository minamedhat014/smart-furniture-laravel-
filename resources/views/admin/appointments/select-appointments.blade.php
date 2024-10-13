@extends('admin.layouts.master')

@section('title')
select appointments
@endsection


@section('contentHeader')

@endsection

@section('content')

<form action="{{route('appointment.index')}}" autocomplete="off" method="POST"  enctype="multipart/form-data">
    @csrf
 
    <div class="row justify-content-center col-12">

        <div class="field col-lg-4 col-md-8 col-sm-12">
            <label  class="page-header"  for="selected_type">Select Type</label>
            <i class="fa-solid fa-filter"></i>
            <select name="selected_type" id="selected_type" class="form-select" 
                @if($errors->has('selected_type')) 
                    style="box-shadow: 1px 3px 5px #f54747;" 
                @endif >
                
                <option value="">Select</option>
                @foreach($types as $type)
                    <option value="{{ $type['name'] }}" {{ old('selected_type') == $type['name'] ? 'selected' : '' }}>
                        {{$type['name']}}
                    </option>
                @endforeach
            </select>
        
            @if($errors->has('selected_type'))
                <span class="field-span text-danger">{{ $errors->first('selected_type') }}</span>
            @endif
        </div>
    </div>
        
         
        <div class="row justify-content-center col-12">
            
            <div class="field col-lg-4 col-md-8 col-sm-12">
                <label  class="page-header" for="selected_zone">Select Zone</label>
                <i class="fa-solid fa-filter"></i>
                <select name="selected_zone" id="selected_zone" class="form-select"
                    @if($errors->has('selected_zone')) 
                        style="box-shadow: 1px 3px 5px #f54747;" 
                    @endif 
                    data-placeholder="Filter appointments by zone">
                    
                    <option value="">Select</option>
                    @foreach($zones as $zone)
                        <option value="{{ $zone->name }}" {{ old('selected_zone') == $zone->name ? 'selected' : '' }}>
                            {{ $zone->name }}
                        </option>
                    @endforeach
                </select>
                
                @if($errors->has('selected_zone'))
                    <span class="field-span text-danger">{{ $errors->first('selected_zone') }}</span>
                @endif
            </div>  
    </div>  

    <div class="row justify-content-center col-12 mt-5"> 
     <button type="submit" class="btn btn-outline-success">proceed to view appointments </button>
   </div>  
                 
</form>

@endsection


