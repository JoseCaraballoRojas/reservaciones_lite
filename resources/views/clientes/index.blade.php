@extends('materialize.template')

@section('page-title', 'Clientes')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Clientes
          <small>Lista de clientes registrados</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li class="active">clientes</li>
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
        <a href="{{ route('user.create') }}" class="waves-effect waves-light green btn" id="add-user">
            <i class=" large mdi-content-add"></i>
            Agregar Cliente
        </a>
    </div>
</div>
<br>

<div class="responsive-table" id="users-table-wrapper">
    <table class="responsive-table striped bordered">
        <thead>
            <th>Email</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>@lang('app.phone')</th>
            <th class="text-center">@lang('app.action')</th>
        </thead>
        @if (count($clientes))
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->first_name }}</td>
                    <td>{{ $cliente->address }}</td>
                    <td>{{ $cliente->phone }}</td>
                    <td class="text-center">
                        <a href="{{ route('user.show', $cliente->id) }}"
                          class="btn-floating  waves-effect waves-light green"
                           title="Ver Cliente" data-toggle="tooltip" data-placement="top">
                          <i  class="mdi-action-visibility"></i>
                        </a>
                        <a href="{{ route('user.edit', $cliente->id) }}"
                          class="btn-floating  waves-effect waves-light light-blue darken-4" title="Editar Cliente"
                                data-toggle="tooltip" data-placement="top">
                          <i class="mdi-content-create"></i>
                        </a>
                        <a href="#"
                          class="btn-floating  waves-effect waves-light red darken-2" title="Eliminar Cliente"
                                data-toggle="tooltip"
                                data-placement="top"
                                data-method="GET"
                                data-confirm-title="Confirme por favor!"
                                data-confirm-text="Seguro que desea eliminar este cliente"
                                data-confirm-delete="Si, lo elimine">
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

    </div>

</div>
@stop
