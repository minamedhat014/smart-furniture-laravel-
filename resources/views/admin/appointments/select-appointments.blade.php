@extends('admin.layouts.master')

@section('title')
select appointments
@endsection


@section('contentHeader')

@endsection

@section('content')
<div class="app-form">

    <form action="{{route('appointment.index')}}" autocomplete="off" method="POST"  enctype="multipart/form-data">
        @csrf  
           
        <div class="row justify-content-center col-12">
            <x-form-select fname="Please select appointment type" bname="selected_type"  display="name" icon="fa-solid fa-filter" :options="$types" value="name" class="req" /> 
            <x-form-select fname="Please select appointment Zone" bname="selected_zone"  display="name" icon="fa-solid fa-filter" :options="$zones" value="name" /> 
        </div>
        <div class="row justify-content-center col-12">
         <button type="submit" class="btn btn-outline-success form-button col-lg-3 col-md-8 col-sm-12">proceed to view appointments </button>
       </div>                     
    </form>

</div>
@endsection


