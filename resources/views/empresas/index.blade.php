@extends('layouts.app')

@section('page-title', 'Empresas')

@section('content')
  <div class="row">
  <div class="col-md-10 col-md-offset-1 ">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="form-signin-heading text-center"><b>Agregar marca</b></h3>
    </div>
    <div class="panel-body">
      {!! Form::open(['route' => 'empresas.store', 'method' => 'POST' ])  !!}
          <div class="form-group">
              {!! Form::label('marca', 'Marca') !!}
              {!! Form::text('marca',null, ['class' => 'form-control',
              'placeholder' => 'Marca', 'required']) !!}
          </div>

      </div>
      <div class="panel-footer">
          <div class="form-group">
              {!! Form::submit('Agregar', ['class' => 'btn btn-primary']) !!}
          </div>
      {!! Form::close() !!}
    </div>
  </div>
  </div>
  </div>
@stop
