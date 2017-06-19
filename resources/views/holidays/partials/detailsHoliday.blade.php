<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2">Detalles del Dia Festivo  </h4>
               <div class="row">

                 <div class="col s12 m6 l3">
                   <div class="row">
                     <div class="finput-field col s12">
                       {!! Form::label('empresa_id', 'Empresas registradas') !!}
                       {!! Form::select('empresa_id', $empresas, $edit ? $empresa_id[0] : '',
                         ['placeholder' => 'selecione una empresa...',
                          'id' => 'selectEmpresa', 'required']) !!}
                      </div>
                    </div>
                  </div>

                <div class="col s12 m6 l3">
                   <div class="row">
                     <div class="finput-field col s12">
                       {!! Form::label('sucursal', 'Sucursal') !!}
                       @if ($edit)
                         {!! Form::select('sucursal', $sucursales, $edit ? $agenda->area->sucursal_id : '',
                           ['placeholder' => 'selecione una sucursal...',
                            'id' => 'selectSucursal', 'required']) !!}
                       @else
                       {!! Form::select('sucursal',['placeholder'=>'Selecciona una sucursal...'],null,['id'=>'selectSucursal']) !!}
                       @endif
                      </div>
                    </div>
                  </div>

                  <div class="col s12 m6 l3">
                     <div class="row">
                       <div class="finput-field col s12">
                         {!! Form::label('area', 'Area') !!}
                         @if ($edit)
                           {!! Form::select('area_id', $areas, $edit ? $agenda->area_id : '',
                             ['placeholder' => 'selecione un area...',
                              'id' => 'selectArea', 'required']) !!}
                         @else
                           {!! Form::select('area_id',['placeholder'=>'Selecciona un area...'],null,['id'=>'selectArea']) !!}
                         @endif
                        </div>
                      </div>
                    </div>

                    <div class="col s12 m6 l3">
                       <div class="row">
                         <div class="finput-field col s12">
                           {!! Form::label('agenda', 'Agenda') !!}
                           @if ($edit)
                             {!! Form::select('agendas_id', $areas, $edit ? $agenda->area_id : '',
                               ['placeholder' => 'selecione una agenda...',
                                'id' => 'selectAgenda', 'required']) !!}
                           @else
                             {!! Form::select('agendas_id',['placeholder'=>'Selecciona un agenda...'],null,['id'=>'selectAgenda']) !!}
                           @endif
                          </div>
                        </div>
                      </div>

                 <div class="col s12">
                   <div class="row">
                     <div class=" col s12">
                       {!! Form::label('day', 'Dia') !!}

                         <div class="input-group date">
                         {!! Form::text('day', $edit ? $holiday->day : '',
                          ['id' => 'day2', 'required', 'class' => 'datepicker' ]) !!}
                          <span class="input-group-addon" style="cursor: default;">
                              <span class="glyphicon glyphicon-calendar"></span>
                          </span>
                        </div>

                    </div>
                  </div>

                    <div class="row">
                      <div class="finput-field col s12">
                        {!! Form::label('reason', 'Razon') !!}
                        {!! Form::text('reason', $edit ? $sucursal->reason : '',
                        ['placeholder' => 'Razon', 'required']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="finput-field col s12">
                        {!! Form::label('details', 'Detalles') !!}
                        {!! Form::text('details', $edit ? $sucursal->details : '',
                        ['placeholder' => 'Detalles', 'required']) !!}
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
