@extends('layout.admin')

@section('content')
    {!! Form::model($voucher, ['route' => ['voucher.update', $voucher->id],'id'=>'formVoucher','class'=>'form-horizontal','method'=>'PATCH']) !!}
      @include('voucher._form',['edit'=>false])
    {!! Form::close() !!}
@stop