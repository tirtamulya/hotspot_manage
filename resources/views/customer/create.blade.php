@extends('layout.admin')

@section('content')
    {!! Form::model($customer = new \App\Customer, ['route' => 'customer.store','id'=>'forCustomer','class'=>'form-horizontal']) !!}
      @include('customer._form',['edit'=>false])
    {!! Form::close() !!}
@stop