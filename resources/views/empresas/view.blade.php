@extends('materialize.template')

@section('page-title', $empresa->nombre)

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          {{ $empresa->nombre }}
          <small>Detalles de la Empresa</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
            <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
            <li><a href="{{ route('empresas.index') }}"> Empresas </a></li>
          <li class="active">{{ $empresa->nombre }}</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>
<div class="row">
    <div class="col s12 m12 l6">
        <div id="edit-user-panel" class="card-panel">
            <h4 class="header2">
                @lang('app.details')
                <div class="pull-right">
                    <a href="{{ route('empresas.edit', $empresa->id) }}" class="edit"
                       data-toggle="tooltip" data-placement="top" title="Editar Empresa">
                        @lang('app.edit')
                    </a>
                </div>
            </h4>
            <div class="card-panel">
              <figure class="card-profile-image">
                <img alt="profile image" class="circle z-depth-2 responsive-img activator"
                     src="{{ url('assets/template/images/avatar.jpg') }}">
              </figure>
                <div class="name"><strong>{{ $empresa->nombre }}</strong></div>
            </div>

                <table class="responsive-table striped bordered">
                    <thead>
                        <tr>
                            <th colspan="3">
                              <h4 class="header2">Informacion de empresa</h4>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> Nombre </td>
                            <td>{{ $empresa->nombre }}</td>
                        </tr>
                        @if ($empresa->telefono)
                            <tr>
                                <td>@lang('app.phone')</td>
                                <td><a href="telto:{{ $empresa->telefono }}">{{ $empresa->telefono }}</a></td>
                            </tr>
                        @endif

                    </tbody>
                </table>
                <br>
                <table class="responsive-table striped bordered">
                    <thead>
                    <tr>
                        <th colspan="3">
                          <h4 class="header2">@lang('app.additional_informations')</h4>
                         </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>@lang('app.address')n</td>
                        <td>{{ $empresa->direccion }}</td>
                    </tr>
                    <tr>
                        <td>@lang('app.city')</td>
                        <td>{{ $empresa->ciudad }}</td>
                    </tr>
                    <tr>
                        <td>Estado </td>
                        <td>{{ $empresa->estado }}</td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
        <div class="col s12 m12 l6">
          <div class="card-panel">
              <h4 class="header2"> Información de Contacto 1  </h4>
                <div class="form-group">
                  <table class="responsive-table striped bordered">
                      <tbody>
                        @foreach($contacto1 as $user)
                          <tr>
                              <td>Usuario </td>
                              <td>{{ $user->username }}</td>
                          </tr>
                          <tr>
                              <td>@lang('app.email')</td>
                              <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                          </tr>
                          <tr>
                              <td>@lang('app.phone') </td>
                              <td><a href="telto:{{ $user->phone }}"> {{ $user->phone }}</a></td>
                          </tr>
                      @endforeach
                      </tbody>
                </table>
              </div>
          </div>
      </div>

      <div class="col s12 m12 l6">
        <div class="card-panel">
            <h4 class="header2">Información de Contacto 2  </h4>
              <table class="responsive-table striped bordered">
                  <tbody>
                    @if ($contacto2)
                      @foreach($contacto2 as $user)
                        <tr>
                            <td>Usuario </td>
                            <td>{{ $user->username }}</td>
                        </tr>
                        <tr>
                            <td>@lang('app.email')</td>
                            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                        </tr>
                        <tr>
                            <td>@lang('app.phone') </td>
                            <td><a href="telto:{{ $user->phone }}"> {{ $user->phone }}</a></td>
                        </tr>
                      @endforeach
                    @else
                      <td> La empresa no tiene un contacto 2 resgistrado</td>
                    @endif
                  </tbody>
              </table>
          </div>
      </div>
</div>


@stop
