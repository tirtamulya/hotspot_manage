@extends('layout.admin')

@section('content')
    {!! Form::model($customer, ['route' => ['customer.update', $customer->id],'id'=>'formCustomer','class'=>'form-horizontal','method'=>'PATCH']) !!}
      @include('customer._form',['edit'=>false])
    {!! Form::close() !!}
@stop