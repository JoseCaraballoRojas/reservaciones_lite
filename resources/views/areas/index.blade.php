@extends('materialize.template')

@section('page-title', 'Areas')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Areas
          <small>Lista de areas registradas</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li class="active">areas</li>
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
        <a href="{{ route('areas.create') }}" class="waves-effect waves-light green btn" id="add-user">
            <i class=" large mdi-content-add"></i>
            Agregar Area
        </a>
    </div>
</div>
<br>

<div class="responsive-table" id="users-table-wrapper">
    <table class="responsive-table striped bordered">
        <thead>
            <th>Area</th>
            <th>Sucursal</th>
            <th>Direccion</th>
            <th>Responsable</th>
            <th>@lang('app.registration_date')</th>
            <th class="text-center">@lang('app.action')</th>
        </thead>
        @if (count($areas))
            @foreach ($areas as $area)
                <tr>
                    <td>{{ $area->area }}</td>
                    <td>{{ $area->sucursal->sucursal }}</td>
                    <td>{{ $area->direccion }}</td>
                    <td>{{ $area->user->username }}</td>
                    <td>{{ $area->created_at->format('Y-m-d') }}</td>
                    <td class="text-center">
                        <a href="{{ route('areas.show', $area->id) }}"
                          class="btn-floating  waves-effect waves-light green"
                           title="Ver Area" data-toggle="tooltip" data-placement="top">
                          <i  class="mdi-action-visibility"></i>
                        </a>
                        <a href="{{ route('areas.edit', $area->id) }}"
                          class="btn-floating  waves-effect waves-light light-blue darken-4" title="Editar Area"
                                data-toggle="tooltip" data-placement="top">
                          <i class="mdi-content-create"></i>
                        </a>
                        <a href="{{ route('areas.destroy', $area->id) }}"
                          class="btn-floating  waves-effect waves-light red darken-2" title="Eliminar Area"
                                data-toggle="tooltip"
                                data-placement="top"
                                data-method="GET"
                                data-confirm-title="Confirme por favor!"
                                data-confirm-text="Seguro que desea eliminar esta area"
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
        <tbody>
        </tbody>
    </table>
    <div class="text-center">
        {!! $areas->render() !!}
    </div>

</div>
@stop
