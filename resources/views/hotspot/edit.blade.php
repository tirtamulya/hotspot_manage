@extends('layout.admin')

@section('content')
    {!! Form::model($hotspot, ['route' => ['hotspot.update', $hotspot->id],'id'=>'formHotspot','class'=>'form-horizontal','method'=>'PATCH']) !!}
      @include('hotspot._form',['edit'=>true])
    {!! Form::close() !!}
@stop