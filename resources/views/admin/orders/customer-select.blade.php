@extends('admin.layouts.master')

@section('title')
customer Select 
@endsection


@section('contentHeader')
<div class="page-header"> 
    please select customer to view orders ....
</div>
@endsection

@section('content')
@livewire('admin.customers.customer-index',['showList' => false])
@endsection
