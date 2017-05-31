@extends('materialize.template')

@section('page-title', 'Agendas')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Citas
          <small>Lista de citas registradas en la agenda</small>
          <div class="pull-right">
            <ol class="breadcrumbs">
              <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
              <li><a href="{{ route('agendas.index') }}">Agendas</a></li>
              <li><a href="{{ route('agendas.show', $agenda->id) }}">{{ $agenda->area->area }}</a></li>
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

<div class="responsive-table" id="users-table-wrapper">
    <table class="responsive-table striped bordered">
        <thead>
            <th>Cliente</th>
            <th>Fecha de la cita</th>
            <th>Hora</th>
            <th>Razon</th>
            <th>Estatus</th>
            <th class="text-center">@lang('app.action')</th>
        </thead>
        <tbody>
          @if (count($citas))
            @foreach ($citas as $cita)
                <tr>
                    <td>{{ $cita->agenda->user->username }}</td>
                    <td>{{ $cita->appointment_date }}</td>
                    <td>{{ $cita->appointment_time}}</td>
                    <td>{{ $cita->reason->reason}}</td>
                    <td>{{ $cita->appointment_status}}</td>
                    <td class="text-center">
                        <a href="{{-- route('agendas.show', $agenda->id) --}}#"
                          class="btn-floating  waves-effect waves-light green"
                           title="AprobarcCita" data-toggle="tooltip" data-placement="top">
                          <i  class="mdi-action-visibility"></i>
                        </a>
                        <a href="{{-- route('agendas.destroy', $agenda->id) --}}#"
                          class="btn-floating  waves-effect waves-light red darken-2" title="Cancelar Cita"
                                data-toggle="tooltip"
                                data-placement="top">
                            <i class="mdi-action-delete"></i>
                        </a>
                    </td>
                </tr>
              @endforeach
          @else
              <tr>
                  <td colspan="6"><em>@lang('app.no_records_found')</em></td>
              </tr>
          @endif
        </tbody>
    </table>
    <div class="text-center">
        {{ $citas->render() }}
    </div>

</div>
@stop
