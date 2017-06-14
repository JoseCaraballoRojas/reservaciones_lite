@extends('materialize.template')

@section('page-title', 'Citas')


@section('content')

  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Citas
          <small>Citas registradas</small>
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

@include('partials.messages')
<br>
<div class="row">
    <div class="col s12 m12 l12">
        <a href="{{ route('citas.create') }}" class="waves-effect waves-light green btn">
            <i class=" large mdi-content-add"></i>
            Agregar Cita
        </a>
    </div>
</div>
<br>
<div class="responsive-table">
    <table class="responsive-table striped bordered">
        <thead>
            <th>Razon</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Estatus</th>
            <th>Agenda</th>
            <th class="text-center">@lang('app.action')</th>
        </thead>
        @if (count($appointments))
            @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->reason->reason }}</td>
                    <td>{{ $appointment->appointment_date }}</td>
                    <td>{{ $appointment->appointment_time }}</td>
                    <td class="{{ 
                                $appointment->appointment_status == 'Esperando aprobacion' ? 'orange-text': '' 
                                }}
                                {{
                                  $appointment->appointment_status == 'aprobada' ? 'green-text': ''
                                  }}"
                                >
                      {{ $appointment->appointment_status }}
                    </td>
                    <td>{{ $appointment->agenda->area->area }}</td>
                    <td class="text-center">
                        <a href="{{ route('citas.show', $appointment->id) }}"
                           class="btn-floating  waves-effect waves-light green"
                           title="Ver Cita" data-toggle="tooltip" data-placement="top">
                            <i  class="mdi-action-visibility"></i>
                        </a>
                        <a href="{{ route('citas.cancelar', $appointment->id) }}"
                          class="btn-floating  waves-effect waves-light red
                          {{ $appointment->appointment_status == 'cancelada' ? 'disabled' : ''}}"
                          title="Cancelar Cita" data-toggle="tooltip" data-placement="top">
                            <i class="mdi-notification-event-busy"></i>
                        </a>
                        <a href="{{-- route('citas.edit', $appointment->id) --}}#"
                          class="btn-floating  waves-effect waves-light light-blue darken-4 disabled"
                          title="Editar Cita" data-toggle="tooltip" data-placement="top"
                          style="cursor: not-allowed">
                            <i class="mdi-content-create"></i>
                        </a>
                        {{-- \Carbon\Carbon::now()--}}

                        <a href="{{ route('citas.destroy', $appointment->id) }}"
                          class="btn-floating  waves-effect waves-light red darken-2
                           @if ( (Carbon\Carbon::parse($appointment->appointment_date)->diffInHours(\Carbon\Carbon::now()) ) < ($appointment->agenda->appointment_date) )
                            disabled" title="Cancelar Cita"
                            style="cursor: not-allowed"
                            @endif
                                data-toggle="tooltip"
                                data-placement="top"
                                data-method="DELETE"
                                data-confirm-title="Confirme por favor!"
                                data-confirm-text="Seguro que desea Cancelar esta cita"
                                data-confirm-delete="Si, la cancele" >
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
        <tbody>
        </tbody>
    </table>
    <div class="text-center">
        {{--{!! $appointments->render() !!}--}}
    </div>
</div>

@stop

