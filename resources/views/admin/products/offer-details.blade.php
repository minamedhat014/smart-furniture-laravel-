@extends('admin.layouts.master')

@section('title')
offer details
@endsection
@section('css')

 
@endsection

@section('contentHeader')
@endsection

@section('content')
@livewire('admin.products.offer-details',['offer_id'=>$id])
@endsection


@section('script')

@endsection