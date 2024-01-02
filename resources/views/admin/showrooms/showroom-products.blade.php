@extends('admin.layouts.master')

@section('title')
showroom products
@endsection
@section('css') 
@section('content')

@livewire('admin.showrooms.showroom-products',['showRoom_id'=>$id])

@endsection