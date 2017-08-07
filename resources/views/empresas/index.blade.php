@extends('materialize.template')

@section('page-title', trans('app.company'))

@section('content')

  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Empresas
          <small>Lista de empresas registradas</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
            <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
            <li class="active">@lang('app.company')s</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

<div class="divider"></div>
<br>
@include('partials.messages')

@if (!count($empresas))
<div class="row">
    <div class="col s12 m12 l12">
        <a href="{{ route('empresas.create') }}" class="btn waves-effect waves-light green  " id="add-user">
            <i class="mdi-content-add"></i>
            Agregar Empresa
        </a>
    </div>
</div>
@endif

<br>
<div class="responsive-table" id="users-table-wrapper">
    <table class="responsive-table striped bordered">
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
                        <a href="{{ route('empresas.show', $empresa->id) }}"
                          class="btn-floating  waves-effect waves-light green"
                           title="Ver Empresa" data-toggle="tooltip" data-placement="top">
                            <i class="mdi-action-visibility"></i>
                        </a>
                        <a href="{{ route('empresas.edit', $empresa->id) }}"
                          class="btn-floating  waves-effect waves-light light-blue darken-4" title="Editar Empresa"
                                data-toggle="tooltip" data-placement="top">
                            <i class="mdi-content-create"></i>
                        </a>
                        <a href="{{ route('empresas.destroy', $empresa->id) }}"
                          class="btn-floating  waves-effect waves-light red darken-2" title="Eliminar Empresa"
                                data-toggle="tooltip"
                                data-placement="top"
                                data-method="GET"
                                data-confirm-title="Confirme por favor!"
                                data-confirm-text="Seguro que desea eliminar esta empresa"
                                data-confirm-delete="Si, la elimine">
                            <i class="mdi-action-delete"></i>
                        </a>
                    </td>
                </tr>
              @endforeach
          @else
              <tr>
                  <td colspan="7"><em>@lang('app.no_records_found')</em></td>
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
