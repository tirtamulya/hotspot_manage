@extends('layout.admin')

@section('content')
    {!! Form::model($voucher = new \App\Voucher, ['route' => 'voucher.store','id'=>'formVoucher','class'=>'form-horizontal']) !!}
      @include('voucher._form',['edit'=>false])
    {!! Form::close() !!}
@stop