@extends('materialize.template')

@section('page-title', 'Citas')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Citas
          <small>Citas registradas en la agenda</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
            <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
            <li><a href="{{ route('citas.indexCliente') }}"> Citas </a></li>
            <li class="active">{{ $agenda->area->area ? $agenda->area->area : '' }}</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

<div class="divider"></div>
<div class="container" id="Selectores">
  <div class="row">
    <div class="col s12 m12 l12">
      <div class="col s12 m4 l4">
        <div class="row">
          <div class="finput-field col s12">
            {!! Form::label('agenda_id', 'Agendas asignadas') !!}
            {!! Form::select('agenda_id', $agendas,null,
              ['placeholder' => 'selecione una agenda...',
               'id' => 'selectAgenda', 'required']) !!}
           </div>
         </div>
       </div>
      </div>
    </div>
</div>
@include('partials.messages')
<div class="divider"></div>

@stop
