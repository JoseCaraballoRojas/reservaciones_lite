@extends('materialize.template')

@section('page-title', 'Dias Festivos')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          Editar Dia Festivo
          <small>Detalles del  Dia Festivo</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li><a href="{{ route('holidays.index') }}">Dias Festivos</a></li>
          <li class="active">@lang('app.edit')</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

<div class="divider"></div>

@include('partials.messages')
{!! Form::open(['route' => ['holidays.update', $holiday], 'method' => 'PUT' ])  !!}
@include('holidays.partials.detailsEditHoliday')


<div class="col s12 ">
    <div class="input-field col s4">
      <div class="input-field col s12">
        <button type="submit" class="btn cyan waves-effect waves-light">
            <i class="mdi-content-save"></i>
            Crear Dia Festivo
        </button>
      </div>
  </div>
</div>

{!! Form::close() !!}
@stop

@section('styles')
    {!! HTML::style('assets/css/bootstrap-datetimepicker.min.css') !!}
@stop

@section('scripts')
      {!! HTML::script('assets/js/moment.min.js') !!}
      {!! HTML::script('assets/js/bootstrap-datetimepicker.min.js') !!}
  <!-- Calendar Script -->
      {!! HTML::script('assets/js/reservaciones/holidays/selectHolidays.js') !!}
@stop
