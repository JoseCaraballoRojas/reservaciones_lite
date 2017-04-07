<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2">Detalles del Area  </h4>
               <div class="row">
                 <div class="col s12">
                   <div class="row">
                     <div class="finput-field col s12">
                       {!! Form::label('sucursal_id', 'Sucursales registradas') !!}
                       {!! Form::select('sucursal_id', $sucursales, $edit ? $area->sucursal_id : '',
                         ['placeholder' => 'selecione una Sucursal...', 'required'  ]) !!}
                      </div>
                    </div>
                  </div>

                 <div class="col s12">
                   <div class="row">
                     <div class="finput-field col s12">
                       {!! Form::label('area', 'Nombre del area o departamento') !!}
                       {!! Form::text('area', $edit ? $area->area : '',
                         ['placeholder' => 'Nombre del area o departamento', 'required']) !!}
                      </div>
                  </div>
                </div>

                <div class="col s12">
                  <div class="row">
                    <div class="finput-field col s12">
                      {!! Form::label('direccion', 'Dirección') !!}
                      {!! Form::text('direccion', $edit ? $area->direccion : '',
                      ['placeholder' => 'Dirección']) !!}
                    </div>
                  </div>
               </div>

              </div>
          </div>
    </div>
</div>
