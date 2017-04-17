@extends('materialize.template')

@section('page-title', 'Calendario de citas')

@section('styles')
  <!-- FULL CALENDAR -->
    {!! HTML::style('assets/template/js/plugins/fullcalendar/css/fullcalendar.min.css') !!}
@stop

@section('content')

  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Citas
          <small>Calendario de citas registradas</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
            <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
            <li class="active">Citas</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

<div class="divider"></div>
<br>
@include('partials.messages')

<!--start container-->
<div class="container">
  <div class="row">
    <div id="full-calendar">
      <div class="col s12 m12 l12">
        <div class="row">
          <div class="col s12 m4 l3">
            <div id='external-events'>
              <h4 class="header">Eventos </h4>
              <div class='fc-event cyan'>Facturas</div>
              <div class='fc-event teal'>LLamar </div>
              <div class='fc-event cyan darken-1'>Cena con el equipo</div>
              <div class='fc-event cyan accent-4'>Reunión con el Equipo de Apoyo</div>
              <div class='fc-event teal accent-4'>Reunión con el equipo de ventas</div>
              <div class='fc-event light-blue accent-3'>Diseñar una aplicación de iOS</div>
              <div class='fc-event light-blue accent-4'>Fiesta de la empresa</div>
              <p>
                <input type='checkbox' id='drop-remove' />
                <label for='drop-remove'>Eliminar después de relizar</label>
              </p>
            </div>
          </div>
          <div class="col s12 m8 l9">
            <div id='calendar'></div>
          </div>
        </div>
    </div>
    </div>
  </div>
</div>
@stop

@section('scripts')

<!-- ================================================
Scripts
================================================ -->
<!-- chartist -->
  {!! HTML::script('assets/template/js/plugins/chartist-js/chartist.min.js') !!}

<!-- Calendar Script -->
    {!! HTML::script('assets/template/js/plugins/fullcalendar/lib/jquery-ui.custom.min.js') !!}
    {!! HTML::script('assets/template/js/plugins/fullcalendar/lib/moment.min.js') !!}
    {!! HTML::script('assets/template/js/plugins/fullcalendar/js/fullcalendar.min.js') !!}
    {!! HTML::script('assets/template/js/plugins/fullcalendar/fullcalendar-script.js') !!}
<!--Canlendar locale ES-->
    {!! HTML::script('assets/template/js/plugins/fullcalendar/lang/es.js') !!}

<!--plugins.js - Some Specific JS codes for Plugin Settings-->
    {!! HTML::script('assets/template/js/plugins.js') !!}
<!--custom-script.js - Add your own theme custom JS-->
    {!! HTML::script('assets/template/js/custom-script.js') !!}


@stop
