<div class="card-panel">
    <h4 class="header2">@lang('app.config_general_agendas')</h4>
    <div class="card-content">
        {!! Form::open(['route' => 'agendas.config.update', 'id' => 'agendas-config-general-form']) !!}

        <div class="row">
          <div class="col s12 ">
            <div class="row">
              <div class="finput-field col s10">
                <label for="time_format">
                    <h6>@lang('app.time_format')</h6></label>
                {!! Form::select('time_format', ['12 horas', '24 horas'], null,
                  ['placeholder' => 'Selecione...', 'required'  ]) !!}
              </div>
            </div>
           </div>
        </div>

        <div class="row">
          <div class="col s12 m12 l12">
            <label for="start_time">
                <h6>@lang('app.start_time')
                  <span class="fa fa-question-circle"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="@lang('app.start_time_description')"></span></h6>
            </label>
            <input type="text" class="col s12 m3 l3 timepicker"
                   name="start_time"
                   value="{{ settings('start_time') }}"
                   id="timepicker" >
          </div>
        </div>

        <div class="row">
          <div class="col s12 m12 l12">
            <label for="final_hour">
                <h6>@lang('app.final_hour')
                  <span class="fa fa-question-circle"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="@lang('app.final_hour_description')"></span></h6>
            </label>
            <input type="text" class="col s12 m3 l3 timepicker"
                   name="final_hour"
                   value="{{ settings('final_hour') }}"
                   id="timepicker" >
          </div>
        </div>

        <div class="row">
          <div class="col s12 m12 l12">
            <label for="blocking_schedules_per_day">
                <h6>@lang('app.blocking_schedules_per_day')
                  <span class="fa fa-question-circle"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="@lang('app.blocking_schedules_per_day_description')"></span></h6>
            </label>
            <div class="switch">
              <label>
                @lang('app.no')
                <input type="hidden" name="blocking_schedules_per_day" value="0">
                <input type="checkbox" name="blocking_schedules_per_day" value="1"
                       {{ settings('blocking_schedules_per_day') ? 'checked' : '' }}>
                <span class="lever"></span> @lang('app.yes')
              </label>
            </div>
          </div>
        </div>
        <br>

        <div class="row">
          <div class="col s12 m12 l12">
            <label for="selectable_agenda">
                <h6>@lang('app.selectable_agenda')
                  <span class="fa fa-question-circle"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="@lang('app.selectable_agenda_description')"></span></h6>
            </label>
            <div class="switch">
              <label>
                @lang('app.no')
                <input type="hidden" name="selectable_agenda" value="0">
                <input type="checkbox" name="selectable_agenda" value="1"
                       {{ settings('selectable_agenda') ? 'checked' : '' }}>
                <span class="lever"></span> @lang('app.yes')
              </label>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col s12">
            <div class="col s12">
              <div class="row">
                <div class="finput-field col s12">
                  <label for="reason_for_appointment">
                      <h6>@lang('app.reason_for_appointment')</h6></label>
                  {!! Form::select('reason_for_appointment', ['Razon 1 (45 minutos)', 'Razon 2 (30 minutos)', 'Razon 3 (60 minutos)' ], null,
                    ['placeholder' => 'Catalogo de razones...', 'required'  ]) !!}
                </div>
              </div>
            </div>
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
