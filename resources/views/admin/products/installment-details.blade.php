@extends('admin.layouts.master')

@section('title')
 installment details
@endsection
@section('css')

 
@endsection

@section('contentHeader')
@endsection

@section('content')
@livewire('admin.products.installment-detail',['installment_id'=>$id])
@endsection


@section('script')

@endsection