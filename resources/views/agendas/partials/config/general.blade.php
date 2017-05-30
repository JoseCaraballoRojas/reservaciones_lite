<div class="card-panel">
    <h4 class="header2">@lang('app.config_general_agendas')</h4>
    <div class="card-content">
      {!! Form::open(['route' => ['agendas.configUpdate', $agenda], 'method' => 'PUT' ]) !!}
        <input type="hidden" name="id" value="{{ $agenda->id }}">
        <div class="row">
          <div class="col s12 ">
            <div class="row">
              <div class="finput-field col s10">
                <label for="time_format">
                    <h6>@lang('app.time_format')</h6></label>
                {!! Form::select('time_format', ['12' => '12 horas', '24' => '24 horas'], $agenda ? $agenda->time_format : '',
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
                   value="{{ $agenda ? $agenda->start_time : '' }}"
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
                   value="{{ $agenda ? $agenda->final_hour : '' }}"
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
                       {{ $agenda->blocking_schedules_per_day == '1' ? 'checked' : ''}}>
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
                       {{ $agenda->selectable_agenda == '1' ? 'checked' : '' }}>
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
                  {!! Form::select('reason_for_appointment',$reasons, $agenda ? $agenda->reason_for_appointment : '',
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
