@extends('materialize.template')

@section('page-title', 'Editar area')

@section('content')

<div class="container">
  <div class="row">
    <div class="col s12 m12 l12">
      <h5 class="breadcrumbs-title">
        Editar Area
        <small>Detalles del Area</small>
      <div class="pull-right">
      <ol class="breadcrumbs">
        <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
        <li><a href="{{ route('areas.index') }}"> Areas </a></li>
        <li class="active">@lang('app.edit')</li>
      </ol>
      </div>
      </h5>
    </div>
  </div>
</div>

@include('partials.messages')
{!! Form::open(['route' => ['areas.update', $area], 'method' => 'PUT' ])  !!}
@include('areas.partials.detailsArea')
@include('areas.partials.detailsContactos')

<div class="col s12 ">
    <div class="input-field col s4">
      <div class="input-field col s12">
          <button type="submit" class="btn cyan waves-effect waves-light">
              <i class="mdi-navigation-refresh"></i>
              Actualizar Area
          </button>
      </div>
    </div>
</div>

{!! Form::close() !!}
@stop
