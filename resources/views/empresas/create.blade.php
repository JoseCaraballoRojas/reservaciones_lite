@extends('materialize.template')

@section('page-title', trans('app.company'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          Crear Nueva Empresa
          <small>Detalles de la Empresa</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
            <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
            <li><a href="{{ route('empresas.index') }}"> Empresas </a></li>
          <li class="active">@lang('app.create')</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

@include('partials.messages')
{!! Form::open(['route' => 'empresas.store', 'method' => 'POST' ])  !!}
@include('empresas.partials.detailsEmpresa')
@include('empresas.partials.detailsContactos')

  <div class="col s12 ">
      <div class="input-field col s4">
        <div class="input-field col s12">
          <button type="submit" class="btn cyan waves-effect waves-light">
              <i class="mdi-content-save"></i>
              Crear Empresa
          </button>
        </div>
    </div>
  </div>

{!! Form::close() !!}
@stop
