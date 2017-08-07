<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2">Detalles del Agenda  </h4>
               <div class="row">

                 <div class="col s12">
                   <div class="row">
                     <div class="finput-field col s12">
                       {!! Form::label('empresa_id', 'Empresas registradas') !!}
                       {!! Form::select('empresa_id', $empresas, $edit ? $agenda->empresa_id : '',
                         ['placeholder' => 'selecione una empresa...',
                          'id' => 'selectEmpresa', 'required']) !!}
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
                <div class="col s12">
                  <div class="row">
                    <div class="finput-field col s12">
                      {!! Form::label('reason', 'Catalogo de razones') !!}
                      {!! Form::select('reason_id', $reasons, $edit ? $agenda->reason_id : '',
                        ['placeholder' => 'selecione una razon...',
                         'id' => 'selectReason', 'required']) !!}
                     </div>
                   </div>
                 </div>
              </div>
          </div>
    </div>
</div>
