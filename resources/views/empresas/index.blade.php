@extends('layouts.app')

@section('page-title', trans('app.company'))

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Empresas
            <small>Lista de empresas registradas</small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                    <li class="active">@lang('app.company')</li>
                </ol>
            </div>
        </h1>
    </div>
</div>

@include('partials.messages')

<div class="row tab-search">
    <div class="col-md-2">
        <a href="{{ route('empresas.create') }}" class="btn btn-success" id="add-user">
            <i class="glyphicon glyphicon-plus"></i>
            Agregar Empresa
        </a>
    </div>
</div>
<div class="table-responsive top-border-table" id="users-table-wrapper">
    <table class="table">
        <thead>
            <th>@lang('app.company')</th>
            <th>Direccion</th>
            <th>Estado</th>
            <th>Telefono</th>
            <th>Contacto 1</th>
            <th>@lang('app.registration_date')</th>
            <th class="text-center">@lang('app.action')</th>
        </thead>
        @if (count($empresas))
            @foreach ($empresas as $empresa)
                <tr>
                    <td>{{ $empresa->nombre }}</td>
                    <td>{{ $empresa->direccion }}</td>
                    <td>{{ $empresa->estado }}</td>
                    <td>{{ $empresa->telefono }}</td>
                    <td>{{ $empresa->user->username }}</td>
                    <td>{{ $empresa->created_at->format('Y-m-d') }}</td>
                    <td class="text-center">
                        <a href="#" class="btn btn-success btn-circle"
                           title="Ver Empresa" data-toggle="tooltip" data-placement="top">
                            <i class="glyphicon glyphicon-eye-open"></i>
                        </a>
                        <a href="{{ route('empresas.edit', $empresa->id) }}" class="btn btn-primary btn-circle edit" title="Editar Empresa"
                                data-toggle="tooltip" data-placement="top">
                            <i class="glyphicon glyphicon-edit"></i>
                        </a>
                        <a href="{{ route('empresas.destroy', $empresa->id) }}" class="btn btn-danger btn-circle" title="Eliminar Empresa"
                                data-toggle="tooltip"
                                data-placement="top"
                                data-method="GET"
                                data-confirm-title="Confirme por favor!"
                                data-confirm-text="Seguro que desea eliminar esta empresa"
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
        {!! $empresas->render() !!}
    </div>

</div>
@stop
