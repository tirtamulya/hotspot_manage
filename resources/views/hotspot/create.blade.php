@extends('layout.admin')

@section('content')
    {!! Form::model($hotspot = new \App\Hotspot, ['route' => 'hotspot.store','id'=>'formHotspot','class'=>'form-horizontal']) !!}
      @include('hotspot._form',['edit'=>false])
    {!! Form::close() !!}
@stop