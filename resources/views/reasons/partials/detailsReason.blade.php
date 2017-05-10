<div class="row">
    <div class="col s12 m6 l6">
        <div class="card-panel">
            <h4 class="header2">@lang('app.details_reasons_appointment')</h4>
               <div class="row">
                 <div class="col s12 m12 l12">
                   <div class="row">
                     <div class="finput-field col s12">
                        {!! Form::label('reason', 'Razon') !!}
                        {!! Form::text('reason', $edit ? $reason->reason : '',
                            ['placeholder' => 'Razon', 'required']) !!}
                      </div>
                    </div>
                    <div class="row">
                      <div class="finput-field col s12">
                        {!! Form::label('duration', 'Duración en minutos') !!}
                        {!! Form::number('duration', $edit ? $reason->duration : '',
                            ['placeholder' => '30', 'required']) !!}
                      </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                          <button type="submit" class="btn cyan waves-effect waves-light">
                              @if ($edit == true)
                                <i class="mdi-navigation-refresh"></i>
                                  @lang('app.update_reason')
                              @else
                                <i class="mdi-content-save"></i>
                                  @lang('app.create_reason')
                              @endif
                          </button>
                        </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
