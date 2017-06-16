<div class="row">
    <div class="col s12 m8 l6">
        <div class="card-panel">
            <h4 class="header2">Detalles del Dia Festivo  </h4>
               <div class="row">
                 <div class="col s12">
                   <div class="row">
                     <div class="finput-field col s12">
                       {!! Form::label('agenda_id', 'Empresas registradas') !!}
                       {!! Form::select('agenda_id', $areas, $edit ? $holiday->agenda_id : '',
                         ['placeholder' => 'Selecione una agenda...', 'required'  ]) !!}
                      </div>
                    </div>
                  </div>

                 <div class="col s12">
                   <div class="row">
                     <div class="finput-field col s12">
                       {!! Form::label('day', 'Dia') !!}
                       {!! Form::text('day', $edit ? $holiday->day : '',
                        ['placeholder' => 'Dia', 'required']) !!}
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
