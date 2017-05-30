@extends('materialize.template')

@section('page-title', 'Citas')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          Agenda
          <small> Detalles de Agenda </small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li><a href="{{ route('agendas.index') }}"> Agendas</a></li>
          <li class="active">{{  $agenda->area->area }}</li>
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
                  <div class="pull-right">
                      <a href="{{ route('agendas.edit', $agenda->id) }}" class="edit"
                         data-toggle="tooltip" data-placement="top" title="Editar Agenda">
                          @lang('app.edit')
                      </a>
                  </div>
              </h4>
              <table class="responsive-table striped bordered">
                  <thead>
                      <tr>
                          <th colspan="2">
                            <h4 class="header2">Informacion de Agenda</h4>
                          </th>
                      </tr>
                  </thead>
                  <tbody>
                    <tr>
                        <td> <b>Agenda:</b> </td>
                        <td> {{ $agenda->area->area }} </td>
                    </tr>
                      <tr>
                          <td> <b>Tipo de reservacion:</b> </td>
                          <td> {{ $agenda->type_reservation }} </td>
                      </tr>
                      <tr>
                          <td> <b> Estatus:</b></td>
                          <td> {{ $agenda->estatus_agenda == '1' ? 'Activa': 'Inactiva' }}  </td>
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
                            <td> {!! $agenda->area->sucursal->empresa->nombre !!}  </td>
                        </tr>
                        <tr>
                            <td> <b> Sucursal:</b></td>
                            <td> {!! $agenda->area->sucursal->sucursal !!}  </td>
                        </tr>
                        <tr>
                            <td> <b> Area o Departamento:</b></td>
                            <td> {!! $agenda->area->area !!}  </td>
                        </tr>
                      <tr>
                          <td> <b> @lang('app.address'):</b></td>
                          <td>{!! $agenda->area->sucursal->direccion !!} </td>
                      </tr>
                      <tr>
                          <td> <b>@lang('app.city'): </b></td>
                          <td>{!! $agenda->area->sucursal->ciudad !!}</td>
                      </tr>
                      <tr>
                          <td> <b>Estado: </b></td>
                          <td>{!! $agenda->area->sucursal->estado !!}</td>
                      </tr>
                      </tbody>
                  </table>
              </div>
          </div>

          <div class="col s12 m12 l6">
            <div class="card-panel">
                <h4 class="header2"> Información de Horaio Laboral   </h4>
                  <div class="form-group">
                    <table class="responsive-table striped bordered">
                        <tbody>
                          <tr>
                            <td> <b> Dias Laborables:</b></td>
                            <td>(
                              @if ($agenda->monday == '1')
                                Lunes
                              @endif
                              @if ($agenda->tuesday == '1')
                                 Martes
                              @endif
                              @if ($agenda->wednesday == '1')
                                Miercoles
                              @endif
                              @if ($agenda->thursday == '1')
                                Jueves
                              @endif
                              @if ($agenda->friday == '1')
                                Viernes
                              @endif
                              @if ($agenda->saturday == '1')
                                Sabado,
                              @endif
                              @if ($agenda->sunday == '1')
                                Domingo
                              @endif
                            )</td>
                          </tr>
                          <tr>
                            <td> <b> Hora inicial:</b></td>
                            <td> {!! $agenda->start_time !!}  </td>
                          </tr>
                          <tr>
                            <td> <b> Hora final:</b></td>
                            <td> {!! $agenda->final_hour !!}  </td>
                          </tr>
                        </tbody>
                  </table>
                </div>
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
                                <td>{!! $agenda->user->first_name !!}
                                    {!! $agenda->user->last_name !!}</td>
                            </tr>
                            <tr>
                                <td> <b>@lang('app.email'):</b></td>
                                <td><a href="mailto:{!! $agenda->user->email !!}">
                                      {!! $agenda->user->email !!}</a></td>
                            </tr>
                            @if ($agenda->user->phone)
                            <tr>
                                <td><b>@lang('app.phone'): </b></td>
                                <td><a href="telto:{!! $agenda->user->phone !!}">
                                      {!! $agenda->user->phone !!}</a></td>
                            </tr>
                            @endif
                            <tr>
                                <td> <b>Sucursal de la Agenda: </b> </td>
                                <td>{!! $agenda->area->sucursal->sucursal !!}</td>
                            </tr>
                            <tr>
                                <td><b>@lang('app.phone'): </b></td>
                                <td><a href="telto:{!! $agenda->area->sucursal->telefono !!}">
                                      {!! $agenda->area->sucursal->telefono !!}</a></td>
                            </tr>
                        </tbody>
                  </table>
                </div>
            </div>
        </div>
  </div>
@stop
