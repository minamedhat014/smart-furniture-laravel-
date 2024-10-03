@extends('admin.layouts.master')

@section('title')
daily appointments
@endsection


@section('contentHeader')

@endsection

@section('content')

@livewire('admin.appointments.daily-appointments',['selected_date'=>$date])

@endsection

