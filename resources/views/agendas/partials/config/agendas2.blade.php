<div class="card-panel">
    <h4 class="header2">@lang('app.config_agendas')</h4>
    <div class="card-content">
      {!! Form::open(['route' => ['agendas.configUpdate', $agenda], 'method' => 'PUT' ]) !!}
        <input type="hidden" name="id" value="{{ $agenda->id }}">
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
                  {!! Form::select('block_time_minutes_hours', ['minutos' => 'Minutos', 'horas' => 'Horas'], null,
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
          <div class="row">
            <div class="col s12 ">
              <div class="row">
                <div class="finput-field col s10">
                  <label for="appointments_time_minutes_hours">
                      <h6>@lang('app.appointments_time_minutes_hours')</h6></label>
                  {!! Form::select('appointments_time_minutes_hours', ['minutos' => 'Minutos', 'horas' => 'Horas'], null,
                    ['placeholder' => 'Selecione...', 'required'  ]) !!}
                </div>
              </div>
             </div>
          </div>

          <div class="row">
            <div class="col s12 m12 l12">
              <label for="max_daily_appointments">
                  <h6>@lang('app.max_daily_appointments')
                    <span class="fa fa-question-circle"
                          data-toggle="tooltip"
                          data-placement="top"
                          title="@lang('app.max_daily_appointments_description')"></span></h6>
              </label>
              <div class="switch">
                <label>
                  @lang('app.no')
                  <input type="hidden" name="max_daily_appointments" value="0">
                  <input type="checkbox" name="max_daily_appointments" value="1"
                         {{ settings('max_daily_appointments') ? 'checked' : '' }}>
                  <span class="lever"></span> @lang('app.yes')
                </label>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col s12 m12 l12">
              <label for="max_number_daily_appointments">
                  <h6>@lang('app.max_number_daily_appointments')</h6>
              </label>
              <input type="text" class="col s12 m2 l2"
                     name="max_number_daily_appointments"
                     value="{{ settings('max_number_daily_appointments', 30) }}">
            </div>
          </div>
          <br>

          <div class="row">
            <div class="col s12 m12 l12">
              <button type="submit" class="btn cyan waves-effect waves-light">
                  <i class="fa fa-refresh"></i>
                  @lang('app.update_settings_agenda')
              </button>
            </div>
          </div>
        {!! Form::close() !!}
    </div>
</div>
