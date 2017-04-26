<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2">Detalles del Agenda  </h4>
               <div class="row">

                 <div class="col s12">
                   <div class="row">
                     <div class="finput-field col s12">
                       {!! Form::label('empresa_id', 'Empresas registradas') !!}
                       {!! Form::select('empresa_id', $empresas, $edit ? $empresa_id[0] : '',
                         ['placeholder' => 'selecione una empresa...',
                          'id' => 'selectEmpresa', 'required']) !!}
                      </div>
                    </div>
                  </div>

                <div class="col s12">
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

                  <div class="col s12">
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

                <div class="col s12">
                  <div class="row">
                    <div class="finput-field col s12">
                      {!! Form::label('direccion', 'Dirección') !!}
                      {!! Form::text('direccion', $edit ? $agenda->direccion : '',
                      ['placeholder' => 'Dirección']) !!}
                    </div>
                  </div>
               </div>
               <div class="col s12">
                 <div class="row">
                   <div class="finput-field col s12">
                     {!! Form::label('motivo', 'Catalogo de motivos') !!}
                     {!! Form::select('motivo', $motivos, $edit ? $agenda->motivo : '',
                       ['placeholder' => 'selecione un motivo...',
                        'id' => 'selectMotivo', 'required']) !!}
                    </div>
                  </div>
                </div>

              </div>
          </div>
    </div>
</div>
