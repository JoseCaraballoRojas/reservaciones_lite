@extends('materialize.template')

@section('page-title', 'Citas')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          Cita
          <small> Detalles de Cita </small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li class="active"><a href="{{ route('citas.indexCliente') }}"> Citas</a></li>

        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

<div class="divider"></div>

@foreach($appointment as $data)

  <div class="row">
      <div class="col s12 m12 l6">
          <div id="edit-user-panel" class="card-panel">
              <h4 class="header2">
                  <div class="pull-right">
                      <a href="{{ route('citas.edit', $data->id) }}" class="edit"
                         data-toggle="tooltip" data-placement="top" title="Editar Cita">
                          @lang('app.edit')
                      </a>
                  </div>
              </h4>
            {{--  <div class="card-panel">
                <figure class="card-profile-image">
                  <img alt="profile image" class="circle z-depth-2 responsive-img activator"
                  src="{{ url('assets/template/images/avatar.jpg') }}">
                </figure>
                  <div class="name"><strong>{{--$data->sucursal</strong></div>
              </div>--}}

                  <table class="responsive-table striped bordered">
                      <thead>
                          <tr>
                              <th colspan="2">
                                <h4 class="header2">Informacion de cita</h4>
                              </th>
                          </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td> <b>Agenda:</b> </td>
                            <td> {!! $data->agenda->area->area !!} </td>
                        </tr>
                          <tr>
                              <td> <b>Razon:</b> </td>
                              <td> {!! $data->reason->reason !!} </td>
                          </tr>
                          <tr>
                              <td> <b>Fecha:</b></td>
                              <td> {!! $data->appointment_date !!} </td>
                          </tr>
                          <tr>
                              <td> <b>Hora:</b></td>
                              <td> {!! $data->appointment_time !!}  </td>
                          </tr>
                          <tr>
                              <td> <b> Estatus:</b></td>
                              <td> {!! $data->appointment_status !!}  </td>
                          </tr>
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
                            <td> <b> Empresa:</b></td>
                            <td> {!! $data->agenda->area->sucursal->empresa->nombre !!}  </td>
                        </tr>
                        <tr>
                            <td> <b> Sucursal:</b></td>
                            <td> {!! $data->agenda->area->sucursal->sucursal !!}  </td>
                        </tr>
                        <tr>
                            <td> <b> Area o Departamento:</b></td>
                            <td> {!! $data->agenda->area->area !!}  </td>
                        </tr>
                      <tr>
                          <td> <b> @lang('app.address'):</b></td>
                          <td>{!! $data->agenda->area->sucursal->direccion !!} </td>
                      </tr>
                      <tr>
                          <td> <b>@lang('app.city'): </b></td>
                          <td>{!! $data->agenda->area->sucursal->ciudad !!}</td>
                      </tr>
                      <tr>
                          <td> <b>Estado: </b></td>
                          <td>{!! $data->agenda->area->sucursal->estado !!}</td>
                      </tr>
                      </tbody>
                  </table>
              </div>
          </div>
          <div class="col s12 m12 l6">
            <div class="card-panel">
                <h4 class="header2"> Información de Contacto  </h4>
                  <div class="form-group">
                    <table class="responsive-table striped bordered">
                        <tbody>
                            <tr>
                                <td> <b>Responsable de Agenda: </b> </td>
                                <td>{!! $data->agenda->user->first_name !!}
                                    {!! $data->agenda->user->last_name !!}</td>
                            </tr>
                            <tr>
                                <td> <b>@lang('app.email'):</b></td>
                                <td><a href="mailto:{!! $data->agenda->user->email !!}">
                                      {!! $data->agenda->user->email !!}</a></td>
                            </tr>
                            <tr>
                                <td><b>@lang('app.phone'): </b></td>
                                <td><a href="telto:{!! $data->agenda->user->phone !!}">
                                      {!! $data->agenda->user->phone !!}</a></td>
                            </tr>
                        </tbody>
                  </table>
                </div>
            </div>
        </div>

        <div class="col s12 m12 l6">
          <div class="card-panel">
              <h4 class="header2"> Información adicional de Contacto   </h4>
                <div class="form-group">
                  <table class="responsive-table striped bordered">
                      <tbody>
                          <tr>
                              <td> <b>Sucursal de la Agenda: </b> </td>
                              <td>{!! $data->agenda->area->sucursal->sucursal !!}</td>
                          </tr>
                          <tr>
                              <td><b>@lang('app.phone'): </b></td>
                              <td><a href="telto:{!! $data->agenda->area->sucursal->telefono !!}">
                                    {!! $data->agenda->area->sucursal->telefono !!}</a></td>
                          </tr>
                      </tbody>
                </table>
              </div>
          </div>
      </div>
  </div>
  @endforeach
@stop
