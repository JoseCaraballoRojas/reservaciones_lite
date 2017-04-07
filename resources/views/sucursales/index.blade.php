@extends('materialize.template')

@section('page-title', trans('app.subsidiaries'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Sucursales
          <small>Lista de sucursales registradas</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li class="active">@lang('app.subsidiaries')</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

@include('partials.messages')

<div class="row">
    <div class="col s12 m12 l12">
        <a href="{{ route('sucursales.create') }}" class="waves-effect waves-light green btn" id="add-user">
            <i class=" large mdi-content-add"></i>
            Agregar Sucursal
        </a>
    </div>
</div>
<br>
<div class="responsive-table" id="users-table-wrapper">
    <table class="responsive-table striped bordered">
        <thead>
            <th>Sucursal</th>
            <th>Direccion</th>
            <th>Estado</th>
            <th>Telefono</th>
            <th>Empresa</th>
            <th>Contacto 1</th>
            <th>@lang('app.registration_date')</th>
            <th class="text-center">@lang('app.action')</th>
        </thead>
        @if (count($sucursales))
            @foreach ($sucursales as $sucursal)
                <tr>
                    <td>{{ $sucursal->sucursal }}</td>
                    <td>{{ $sucursal->direccion }}</td>
                    <td>{{ $sucursal->estado }}</td>
                    <td>{{ $sucursal->telefono }}</td>
                    <td>{{ $sucursal->empresa->nombre }}</td>
                    <td>{{ $sucursal->user->username }}</td>
                    <td>{{ $sucursal->created_at->format('Y-m-d') }}</td>
                    <td class="text-center">
                        <a href="{{ route('sucursales.show', $sucursal->id) }}"
                           class="btn-floating btn-large waves-effect waves-light green"
                           title="Ver Sucursal" data-toggle="tooltip" data-placement="top">
                            <i  class="mdi-action-visibility"></i>
                        </a>
                        <a href="{{ route('sucursales.edit', $sucursal->id) }}"
                          class="btn-floating btn-large waves-effect waves-light blue"
                          title="Editar Sucursal" data-toggle="tooltip" data-placement="top">
                            <i class="mdi-content-create"></i>
                        </a>
                        <a href="{{ route('sucursales.destroy', $sucursal->id) }}"
                          class="btn-floating btn-large waves-effect waves-light red darken-2" title="Eliminar Sucursal"
                                data-toggle="tooltip"
                                data-placement="top"
                                data-method="DELETE"
                                data-confirm-title="Confirme por favor!"
                                data-confirm-text="Seguro que desea eliminar esta sucursal"
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
        {!! $sucursales->render() !!}
    </div>

</div>
@stop
