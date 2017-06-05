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
              <li>
                  @if (Auth::user()->roles->first()->name == 'Admin')
                      <a href="{{ route('agendas.index') }}"> Agendas</a>
                  @else
                      <a href="{{ route('agendas.agendasResponsable') }}"> Agendas</a>
                  @endif
              </li>
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
                    @if ($cita->appointment_status == 'aprobada')
                        <td class="green-text">
                    @elseif ($cita->appointment_status == 'cancelada')
                        <td class="red-text">
                    @else
                      <td class="orange-text">
                    @endif
                    {{ $cita->appointment_status}}</td>
                    <td class="text-center">
                        <a href="{{ route('citas.cancelar', $cita->id) }}"
                          class="btn-floating  waves-effect waves-light red
                          {{ $cita->appointment_status == 'cancelada' ? 'disabled' : ''}}"
                          title="Cancelar Cita" data-toggle="tooltip" data-placement="top">
                            <i class="mdi-notification-event-busy"></i>
                        </a>
                        <a href="{{ route('citas.aprobar', $cita->id) }}"
                          class="btn-floating  waves-effect waves-light green
                          {{ $cita->appointment_status == 'aprobada' ? 'disabled' : ''}} "
                           title="Aprobar Cita" data-toggle="tooltip" data-placement="top">
                          <i  class="mdi-notification-event-available"></i>
                        </a>
                        <a href="{{ route('citas.destroy', $cita->id) }}"
                          onclick=" return confirm('¿Seguro que deseas eliminar la cita ?')"
                          class="btn-floating  waves-effect waves-light red darken-2" title="Eliminar Cita"
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
