@extends('layout.admin')

@section('content')
    {!! Form::model($sale, ['route' => ['sales.update', $sale->id],'id'=>'formSales','class'=>'form-horizontal','method'=>'PATCH']) !!}
      @include('sales._form',['edit'=>true])
    {!! Form::close() !!}
@stop