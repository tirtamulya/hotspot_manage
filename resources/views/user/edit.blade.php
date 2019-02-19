@extends('layout.admin')

@section('content')
    {!! Form::model($user, ['route' => ['user.update', $user->id],'id'=>'formUser','class'=>'form-horizontal','method'=>'PATCH']) !!}
      @include('user._form',['edit'=>true])
    {!! Form::close() !!}
@stop