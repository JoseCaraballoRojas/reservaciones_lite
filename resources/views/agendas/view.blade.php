@extends('materialize.template')

@section('page-title', $area->area)

@section('content')

<div class="container">
  <div class="row">
    <div class="col s12 m12 l12">
      <h5 class="breadcrumbs-title">
        {{ $area->area }}
        <small> Detalles del Area </small>
      <div class="pull-right">
      <ol class="breadcrumbs">
        <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
        <li><a href="{{ route('areas.index') }}"> Areas</a></li>
        <li class="active">{{ $area->area }}</li>
      </ol>
      </div>
      </h5>
    </div>
  </div>
</div>

<div class="divider"></div>

<div class="row">
    <div class="col s12 m12 l6">
        <div id="edit-user-panel" class="card-panel">
            <h4 class="header2">
                @lang('app.details')
                <div class="pull-right">
                    <a href="{{ route('areas.edit', $area->id) }}" class="edit"
                       data-toggle="tooltip" data-placement="top" title="Editar Area">
                        @lang('app.edit')
                    </a>
                </div>
            </h4>
            <div class="card-panel">
              <figure class="card-profile-image">
                <img alt="profile image" class="circle z-depth-2 responsive-img activator"
                src="{{ url('assets/template/images/avatar.jpg') }}">
              </figure>
                <div class="name"><strong>{{ $area->area }}</strong></div>
            </div>
              <br>
                <table class="responsive-table striped bordered">
                    <thead>
                        <tr>
                            <th colspan="3">Informacion del area</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> Area </td>
                            <td>{{ $area->area }}</td>
                        </tr>
                    </tbody>
                </table>

                <table class="responsive-table striped bordered">
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
        <div class="col s12 m12 l6">
          <div class="card-panel">
              <h4 class="header2">Información de Responsable  </h4>
              <div class="panel-body">
                  <div class="form-group">
                    <table class="responsive-table striped bordered">
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
