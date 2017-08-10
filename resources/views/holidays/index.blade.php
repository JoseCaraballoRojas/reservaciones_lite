@extends('materialize.template')

@section('page-title', 'dias festivos')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Dias Festivos
          <small>Lista de dias festivos registradas</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li class="active">Dias festivos</li>
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
        <a href="{{ route('holidays.create') }}" class="waves-effect waves-light green btn" id="add-user">
            <i class=" large mdi-content-add"></i>
            Agregar Dia Festivo
        </a>
    </div>
</div>
<br>
<div class="responsive-table" id="users-table-wrapper">
    <table class="responsive-table striped bordered">
        <thead>
            <th>Dia</th>
            <th>razon</th>
            <th>destalles</th>
            <th>Agenda</th>
            <th class="text-center">@lang('app.action')</th>
        </thead>
        @if (count($holidays))
            @foreach ($holidays as $holiday)
                <tr>
                    <td>{{ $holiday->day }}</td>
                    <td>{{ $holiday->reason }}</td>
                    <td>{{ $holiday->details }}</td>
                    <td>{{ $holiday->agenda->empresa->nombre }}</td>
                    <td class="text-center">
                        <a href="{{ route('holidays.edit', $holiday->id) }}"
                          class="btn-floating  waves-effect waves-light light-blue darken-4"
                          title="Editar Dia Festivo" data-toggle="tooltip" data-placement="top">
                            <i class="mdi-content-create"></i>
                        </a>
                        <a href="{{ route('holidays.destroy', $holiday->id) }}"
                          class="btn-floating  waves-effect waves-light red darken-2" title="Eliminar Dia Festivo"
                                data-toggle="tooltip"
                                data-placement="top"
                                data-method="DELETE"
                                data-confirm-title="Confirme por favor!"
                                data-confirm-text="Seguro que desea eliminar esta dia festivo"
                                data-confirm-delete="Si, la elimine">
                            <i class="mdi-action-delete"></i>
                        </a>
                    </td>
                </tr>
              @endforeach
          @else
              <tr>
                  <td colspan="5"><em>@lang('app.no_records_found')</em></td>
              </tr>
          @endif
        <tbody>
        </tbody>
    </table>
    <div class="text-center">
        {!! $holidays->render() !!}
    </div>

</div>
@stop
