@extends('materialize.template')

@section('page-title', 'Citas')

@section('styles')
<!-- FULL CALENDAR -->
    {!! HTML::style('assets/plugins/fullcalendar/fullcalendar.css') !!}
<!-- FULL CALENDAR STYLE CSS -->
    {!! HTML::style('assets/css/reservaciones/citas/fullcalendar-style.css') !!}
@stop

@section('content')

  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Citas
          <small>Solicitar citas</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
            <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
            <li><a href="{{ route('citas.indexCliente') }}"> Citas </a></li>
            <li class="active">@lang('app.create')</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

<div class="divider"></div>

@include('partials.messages')
<div class="container" id="Selectores">
  <div class="row">
    <div class="col s12 m12 l12">
      <div class="col s12 m4 l4">
        <div class="row">
          <div class="finput-field col s12">
            {!! Form::label('empresa_id', 'Empresas registradas') !!}
            {!! Form::select('empresa_id', $empresas,null,
              ['placeholder' => 'selecione una empresa...',
               'id' => 'selectEmpresa', 'required']) !!}
           </div>
         </div>
       </div>

      <div class="col s12 m4 l4" id="Sucursal">
        <div class="row">
          <div class="finput-field col s12">
            {!! Form::label('sucursal', 'Sucursal') !!}
            {!! Form::select('sucursal',['placeholder'=>'Selecciona una sucursal...'],null,['id'=>'selectSucursal']) !!}
           </div>
         </div>
       </div>

       <div class="col s12 m4 l4" id="Area">
          <div class="row">
            <div class="finput-field col s12">
              {!! Form::label('area', 'Area') !!}
                {!! Form::select('area_id',['placeholder'=>'Selecciona un area...'],null,['id'=>'selectArea']) !!}
             </div>
           </div>
         </div>
      </div>
    </div>
</div>
<div class="divider"></div>
<!--start container-->
<div class="container" >
  <div class="row">
    <div class="col s12 m12 l12">
      <div id='calendar'></div>
    </div>
  </div>
</div>
<br>
<div class="container">
  <div class="row">
    <div class="col s12 m3 l3">
      <a href="#" class="col s12 btn red waves-effect waves-red
       modal-action" id="btn-back-calendar">
        @lang('app.cancel')
      </a>
    </div>
  </div>
</div>
<!-- modal 1-->
<div class="row">
  <a href="#modalForm" class="modal-trigger" id="btn-modal" ></a>
  {!! Form::open(['route' => 'citas.store', 'method' => 'POST' ])  !!}
  <div class="modal modal-fixed-footer" id="modalForm">
    <div class="modal-content">
      <h3 class="modal-title center" id="tos-label">Solicitar Cita</h3>
      <div class="divider"></div>
      <br>
      <div class="col s12">
        <div class="row">
          <input name="cliente_id" type="hidden" value="<?=  Auth::user()->id ?>">
          <input name="agenda_id" type="hidden" value="" id="agenda_id">
          <input name="appointment_status" type="hidden" value="Aprobada" id="appointment_status">
          <div class="finput-field col s3">

            {!! Form::label('appointment_date', 'Fecha') !!}
            {!! Form::text('appointment_date', null,
                ['id' => 'appointment_date']) !!}
          </div>
          <div class="finput-field col s5">
              {!! Form::label('reason_id', 'Razon de la cita') !!}
              {!! Form::select('reason_id', $reasons,null,
                ['placeholder' => 'selecione una razon...',
                 'id' => 'selectReason', 'required']) !!}
          </div>
          <div class="finput-field col s4">
              {!! Form::label('appointment_time', 'Hora de la cita') !!}
              {!! Form::text('appointment_time',null,
                  ['id' => 'appointment_time', 'class' => 'timepicker_cita',
                  'id' => 'timepicker_cita']) !!}
          </div>
        </div>
      </div>
    </div>
    <div class="modal-footer">
      <div class="finput-field col s3">
        <a href="#" class=" btn red waves-effect waves-red
            modal-action modal-close" id="btn-modal-close">
            @lang('app.cancel')
        </a>
    </div>
    <div class="finput-field col s4 offset-s5">
      <button type="submit" class="btn cyan waves-effect waves-light">
          <i class="mdi-content-save"></i>
          Crear cita
      </button>
    </div>
    </div>
  </div>
</div>
@stop

@section('scripts')

<!-- ============= Scripts ========= -->
<!-- Calendar Script -->
    {!! HTML::script('assets/plugins/fullcalendar/lib/jquery-ui.min.js') !!}
    {!! HTML::script('assets/plugins/fullcalendar/lib/moment.min.js') !!}
    {!! HTML::script('assets/plugins/fullcalendar/fullcalendar.js') !!}
    {!! HTML::script('assets/js/reservaciones/citas/fullcalendar-script.js') !!}
<!--Canlendar locale ES-->
    {!! HTML::script('assets/plugins/fullcalendar/locale/es.js') !!}

<!-- control de eventos para solicitar citas-->
    {!! HTML::script('assets/js/reservaciones/citas/addCitas.js') !!}
<!-- cargar timepicker-->
  {!! HTML::script('assets/template/js/materialize-plugins/date_picker/picker.time.js') !!}
@stop
