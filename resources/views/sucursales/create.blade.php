@extends('materialize.template')

@section('page-title', trans('app.subsidiaries'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          Crear Nueva Sucursal
          <small>Detalles de la Sucursal</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li><a href="{{ route('sucursales.index') }}">@lang('app.subsidiaries')</a></li>
          <li class="active">@lang('app.create')</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

@include('partials.messages')
{!! Form::open(['route' => 'sucursales.store', 'method' => 'POST' ])  !!}
@include('sucursales.partials.detailsSucursal')
@include('sucursales.partials.detailsContactos')

<div class="col s12 ">
    <div class="input-field col s4">
      <div class="input-field col s12">
        <button type="submit" class="btn cyan waves-effect waves-light">
            <i class="mdi-content-save"></i>
            Crear Sucursal
        </button>
      </div>
  </div>
</div>

{!! Form::close() !!}
@stop
