@extends('layouts.app')

@section('page-title', trans('app.subsidiaries'))

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            sucursales
            <small>Lista de sucursales registradas</small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                    <li class="active">@lang('app.subsidiaries')</li>
                </ol>
            </div>
        </h1>
    </div>
</div>

@include('partials.messages')

<div class="row tab-search">
    <div class="col-md-2">
        <a href="{{ route('sucursales.create') }}" class="btn btn-success" id="add-user">
            <i class="glyphicon glyphicon-plus"></i>
            Agregar Sucursal
        </a>
    </div>
</div>
<div class="table-responsive top-border-table" id="users-table-wrapper">
    <table class="table">
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
                        <a href="{{ route('sucursales.show', $sucursal->id) }}" class="btn btn-success btn-circle"
                           title="Ver Sucursal" data-toggle="tooltip" data-placement="top">
                            <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                        <a href="{{ route('sucursales.edit', $sucursal->id) }}" class="btn btn-primary btn-circle edit" title="Editar Sucursal"
                                data-toggle="tooltip" data-placement="top">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                        <a href="{{ route('sucursales.destroy', $sucursal->id) }}" class="btn btn-danger btn-circle" title="Eliminar Sucursal"
                                data-toggle="tooltip"
                                data-placement="top"
                                data-method="GET"
                                data-confirm-title="Confirme por favor!"
                                data-confirm-text="Seguro que desea eliminar esta sucursal"
                                data-confirm-delete="Si, la elimine">
                            <i class="glyphicon glyphicon-trash"></i>
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
