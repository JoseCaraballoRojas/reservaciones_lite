<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2">Detalles del Dia Festivo  </h4>
               <div class="row">
                 {{--!! Form::hidden('agendas_id', $agenda_id) !!--}}
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
