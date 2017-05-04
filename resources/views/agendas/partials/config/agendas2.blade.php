<div class="card-panel">
    <h4 class="header2">@lang('app.config_agendas')</h4>
    <div class="card-content">
        {!! Form::open(['route' => 'settings.auth.update', 'id' => 'registration-settings-form']) !!}

          <div class="row">
            <div class="col s12 m12 l12">
              <label for="block_time">
                  <h6>@lang('app.block_time')
                  <span class="fa fa-question-circle"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="@lang('app.block_time_description')"></span></h6>
              </label>
              <input type="text" class="col s12 m2 l2"
                     name="block_time"
                     value="{{ settings('block_time', 30) }}">
            </div>
          </div>

          <div class="row">
            <div class="col s12">
              <div class="row">
                <div class="finput-field col s10">
                  <label for="block_time_minutes_hours">
                      <h6>@lang('app.block_time_minutes_hours')</h6></label>
                  {!! Form::select('block_time_minutes_hours', ['Minutos', 'Horas'], null,
                    ['placeholder' => 'Selecione...', 'required'  ]) !!}
                 </div>
               </div>
             </div>
          </div>

          <div class="row">
            <div class="col s12 m12 l12">
              <label for="max_per_block">
                  <h6>@lang('app.max_per_block')
                  <span class="fa fa-question-circle"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="@lang('app.max_per_block_description')"></span></h6>
              </label>
              <input type="text" class="col s12 m2 l2"
                     name="max_per_block"
                     value="{{ settings('max_per_block', 30) }}">
            </div>
          </div>

          <div class="row">
            <div class="col s12 m12 l12">
              <label for="time_of_each_appointment">
                  <h6>@lang('app.time_of_each_appointment')
                  <span class="fa fa-question-circle"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="@lang('app.time_of_each_appointment_description')"></span></h6>
              </label>
              <input type="text" class="col s12 m2 l2"
                     name="time_of_each_appointment"
                     value="{{ settings('time_of_each_appointment', 30) }}">
            </div>
          </div>

          


        {!! Form::close() !!}
    </div>
</div>
