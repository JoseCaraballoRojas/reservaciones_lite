@extends('materialize.template')

@section('page-title', 'Agendas')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          Crear Nueva Agenda
          <small>Detalles de la Agenda</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li><a href="{{ route('agendas.index') }}">Agendas</a></li>
          <li class="active">@lang('app.create')</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

<div class="divider"></div>

@include('partials.messages')
{!! Form::open(['route' => 'agendas.store', 'method' => 'POST' ])  !!}
@include('agendas.partials.detailsAgenda')
@include('agendas.partials.detailsContacto')

<div class="col s12 ">
    <div class="input-field col s4">
      <div class="input-field col s12">
        <button type="submit" class="btn cyan waves-effect waves-light">
            <i class="mdi-content-save"></i>
            Crear Agenda
        </button>
      </div>
  </div>
</div>

{!! Form::close() !!}
@stop

@section('scripts')
  <!-- Calendar Script -->
      {!! HTML::script('assets/js/reservaciones/agenda.js') !!}
@stop
