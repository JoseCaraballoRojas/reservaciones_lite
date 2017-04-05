@extends('layouts.app')

@section('page-title', $area->area)

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            {{ $area->area }}
            <small> Detalles de Area </small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                    <li><a href="{{ route('areas.index') }}"> Areas</a></li>
                    <li class="active">{{ $area->area }}</li>
                </ol>
            </div>

        </h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-7">
        <div id="edit-user-panel" class="panel panel-default">
            <div class="panel-heading">
                @lang('app.details')
                <div class="pull-right">
                    <a href="{{ route('areas.edit', $area->id) }}" class="edit"
                       data-toggle="tooltip" data-placement="top" title="Editar Area">
                        @lang('app.edit')
                    </a>
                </div>
            </div>
            <div class="panel-body panel-profile">
                <div class="image">
                    <img alt="image" class="img-circle" src="">
                </div>
                <div class="name"><strong>{{ $area->area }}</strong></div>
            </div>
                <br>
                <table class="table table-hover table-details">
                    <thead>
                        <tr>
                            <th colspan="3">Informacion de area</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> Area </td>
                            <td>{{ $area->area }}</td>
                        </tr>
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
                        <td>{{ $area->direccion }}</td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
        <div class="col-lg-6 col-md-7">
          <div class="panel panel-default">
              <div class="panel-heading">Información de Responsable  </div>
              <div class="panel-body">
                  <div class="form-group">
                    <table class="table table-hover">
                        <tbody>
                          @foreach($responsable as $user)
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
    </div>
</div>

@stop
