@extends('layout.admin')

@section('content')
{{ $hotspot_list }}
    {!! Form::model($user = new \App\User, ['route' => 'user.store','id'=>'formUser','class'=>'form-horizontal']) !!}
      @include('user._form',['edit'=>false])
    {!! Form::close() !!}
@stop