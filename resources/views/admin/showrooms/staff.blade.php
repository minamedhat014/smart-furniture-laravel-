@extends('admin.layouts.master')

@section('title')
showroom staff
@endsection



@section('content')

@livewire('admin.showrooms.staff-member',['branch_id'=>$id])

@endsection


