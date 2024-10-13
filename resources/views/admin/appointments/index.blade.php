@extends('admin.layouts.master')

@section('title')
appointments
@endsection


@section('contentHeader')

@endsection

@section('content')

@livewire('admin.appointments.appointment-calender',['selected_type' => $type , 'selected_zone'=>$zone])

@endsection

