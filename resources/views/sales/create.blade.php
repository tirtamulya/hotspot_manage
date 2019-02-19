@extends('layout.admin')

@section('content')
    {!! Form::model($sale = new \App\Sale, ['route' => 'sales.store','id'=>'formSales','class'=>'form-horizontal']) !!}
      @include('sales._form',['edit'=>false])
    {!! Form::close() !!}
@stop