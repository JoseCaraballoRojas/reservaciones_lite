@extends('layouts.app')

@section('page-title', 'areas')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            areas
            <small>Lista de areas registradas</small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                    <li class="active">areas</li>
                </ol>
            </div>
        </h1>
    </div>
</div>

@include('partials.messages')

<div class="row tab-search">
    <div class="col-md-2">
        <a href="{{ route('areas.create') }}" class="btn btn-success" id="add-user">
            <i class="glyphicon glyphicon-plus"></i>
            Agregar Area
        </a>
    </div>
</div>
<div class="table-responsive top-border-table" id="users-table-wrapper">
    <table class="table">
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
                        <a href="{{ route('areas.show', $area->id) }}" class="btn btn-success btn-circle"
                           title="Ver Area" data-toggle="tooltip" data-placement="top">
                            <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                        <a href="{{ route('areas.edit', $area->id) }}" class="btn btn-primary btn-circle edit" title="Editar Area"
                                data-toggle="tooltip" data-placement="top">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                        <a href="{{ route('areas.destroy', $area->id) }}" class="btn btn-danger btn-circle" title="Eliminar Area"
                                data-toggle="tooltip"
                                data-placement="top"
                                data-method="GET"
                                data-confirm-title="Confirme por favor!"
                                data-confirm-text="Seguro que desea eliminar esta area"
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
        {!! $areas->render() !!}
    </div>

</div>
@stop
