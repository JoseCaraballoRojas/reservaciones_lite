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

<div class="row">
    <div class="col s12 m12 l12">
        <a href="{{ route('agendas.create') }}" class="waves-effect waves-light green btn" id="add-user">
            <i class=" large mdi-content-add"></i>
            Agregar Agenda
        </a>
    </div>
</div>
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
                        <a href="{{-- route('agendas.show', $agenda->id) --}}#"
                          class="btn-floating  waves-effect waves-light green disabled"
                           title="Ver Agenda" data-toggle="tooltip" data-placement="top">
                          <i  class="mdi-action-visibility"></i>
                        </a>
                        <a href="{{-- route('agendas.edit', $agenda->id) --}}#"
                          class="btn-floating  waves-effect waves-light light-blue darken-4 disabled" title="Editar Agenda"
                                data-toggle="tooltip" data-placement="top">
                          <i class="mdi-content-create"></i>
                        </a>
                        <a href="{{ route('agendas.config', $agenda->id) }}"
                          class="btn-floating  waves-effect waves-light orange darken-2" title="Configurar Agenda"
                                data-toggle="tooltip" data-placement="top">
                          <i class="mdi-action-settings"></i>
                        </a>
                        <a href="{{ route('agendas.destroy', $agenda->id) }}"
                          class="btn-floating  waves-effect waves-light red darken-2" title="Eliminar Agenda"
                                data-toggle="tooltip"
                                data-placement="top"
                                data-method="GET"
                                data-confirm-title="Confirme por favor!"
                                data-confirm-text="Seguro que desea eliminar esta agenda"
                                data-confirm-delete="Si, la elimine">
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
        {!! $agendas->render() !!}
    </div>

</div>
@stop
