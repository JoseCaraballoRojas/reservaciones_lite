@extends('materialize.template')

@section('page-title', 'Editar Agenda')

@section('content')

<div class="container">
  <div class="row">
    <div class="col s12 m12 l12">
      <h5 class="breadcrumbs-title">
        Editar Agenda
        <small>Detalles de la Agenda</small>
      <div class="pull-right">
      <ol class="breadcrumbs">
        <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
        <li><a href="{{ route('agendas.index') }}"> Agendas </a></li>
        <li class="active">@lang('app.edit')</li>
      </ol>
      </div>
      </h5>
    </div>
  </div>
</div>

<div class="divider"></div>

@include('partials.messages')
{!! Form::open(['route' => ['agendas.update', $agenda], 'method' => 'PUT' ])  !!}
@include('agendas.partials.detailsAgenda')
@include('agendas.partials.detailsContacto')

<div class="col s12 ">
    <div class="input-field col s4">
      <div class="input-field col s12">
          <button type="submit" class="btn cyan waves-effect waves-light">
              <i class="mdi-navigation-refresh"></i>
              Actualizar Agenda
          </button>
      </div>
    </div>
</div>

{!! Form::close() !!}
@stop
