@extends('layouts.app')

@section('page-title', $empresa->nombre)

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ $empresa->nombre }}
            <small> Detalles de Empresa </small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                    <li><a href="{{ route('empresas.index') }}"> Empresas</a></li>
                    <li class="active">{{ $empresa->nombre }}</li>
                </ol>
            </div>

        </h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-5">
        <div id="edit-user-panel" class="panel panel-default">
            <div class="panel-heading">
                @lang('app.details')
                <div class="pull-right">
                    <a href="{{ route('empresas.edit', $empresa->id) }}" class="edit"
                       data-toggle="tooltip" data-placement="top" title="Editar Empresa">
                        @lang('app.edit')
                    </a>
                </div>
            </div>
            <div class="panel-body panel-profile">
                <div class="image">
                    <img alt="image" class="img-circle" src="">
                </div>
                <div class="name"><strong>{{ $empresa->nombre }}</strong></div>
            </div>
                <br>
                <table class="table table-hover table-details">
                    <thead>
                        <tr>
                            <th colspan="3">Informacion de empresa</th>
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

                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th colspan="3">@lang('app.additional_informations')</th>
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
        <div class="col-lg-4 col-md-7">
          <div class="panel panel-default">
              <div class="panel-heading">Información de Contacto 1  </div>
              <div class="panel-body">
                  <div class="form-group">
                    <table class="table table-hover">
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
        </div>
        <div class="col-lg-4 col-md-7">
          <div class="panel panel-default">
              <div class="panel-heading">Información de Contacto 2  </div>
              <div class="panel-body">
                  <div class="form-group">
                    <table class="table table-hover">
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
        </div>
    </div>
</div>

@stop
