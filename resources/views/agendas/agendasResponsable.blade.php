@extends('materialize.template')

@section('page-title', 'Agendas')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Agendas
          <small>Lista de agendas registradas</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li class="active">Agendas</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

<div class="divider"></div>
<br>

@include('partials.messages')

<br>

<div class="responsive-table" id="users-table-wrapper">
    <table class="responsive-table striped bordered">
        <thead>
            <th>Responsable de agenda</th>
            <th>Direccion</th>
            <th>Area</th>
            <th>@lang('app.registration_date')</th>
            <th class="text-center">@lang('app.action')</th>
        </thead>
        <tbody>
          @if (count($agendas))
            @foreach ($agendas as $agenda)
                <tr>
                    <td>{{ $agenda->user->username }}</td>
                    <td>{{ $agenda->direccion }}</td>
                    <td>{{ $agenda->area->area }}</td>
                    <td>{{ $agenda->created_at->format('Y-m-d') }}</td>
                    <td class="text-center">
                        <a href="{{ route('agendas.show', $agenda->id) }}"
                          class="btn-floating  waves-effect waves-light green"
                           title="Ver Agenda" data-toggle="tooltip" data-placement="top">
                          <i  class="mdi-action-visibility"></i>
                        </a>
                        <a href="{{ route('agendas.citas', $agenda->id) }}"
                          class="btn-floating  waves-effect waves-light light-blue" title="Ver Citas"
                                data-toggle="tooltip" data-placement="top">
                          <i class="mdi-action-event"></i>
                        </a>
                        <a href="{{ route('agendas.config', $agenda->id) }}"
                          class="btn-floating  waves-effect waves-light orange darken-2" title="Configurar Agenda"
                                data-toggle="tooltip" data-placement="top">
                          <i class="mdi-action-settings"></i>
                        </a>                        
                    </td>
                </tr>
              @endforeach
          @else
              <tr>
                  <td colspan="6"><em>No tiene agendas asignadas</em></td>
              </tr>
          @endif
        </tbody>
    </table>
    <div class="text-center">
        {!! $agendas->render() !!}
    </div>

</div>
@stop
