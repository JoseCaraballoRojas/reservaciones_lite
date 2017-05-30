<div class="card-panel">
    <h4 class="header2">@lang('app.config_citas')</h4>
    <div class="card-content">
      {!! Form::open(['route' => ['agendas.configUpdate', $agenda], 'method' => 'PUT' ]) !!}
        <input type="hidden" name="id" value="{{ $agenda->id }}">

        <div class="row">
          <div class="col s12 m12 l12">
            <label for="allow_modify_date_time">
                <h6>@lang('app.allow_modify_date_time')</h6>
            </label>
            <div class="switch">
              <label>
                @lang('app.no')
                <input type="hidden" name="allow_modify_date_time" value="0">
                <input type="checkbox" name="allow_modify_date_time" value="1"
                       {{ $agenda->allow_modify_date_time == '1' ? 'checked' : '' }}>
                <span class="lever"></span> @lang('app.yes')
              </label>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col s12 m12 l12">
            <label for="anticipation_time_modify">
                <h6>@lang('app.anticipation_time_modify')
                <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="@lang('app.anticipation_time_modify_description')"></span></h6>
            </label>
            <input type="text" class="col s12 m2 l2"
                   name="anticipation_time_modify"
                   value="{{ $agenda ? $agenda->anticipation_time_modify: '48' }}">
          </div>
        </div>


        <div class="row">
          <div class="col s12 m12 l12">
            <label for="cancel_appointment">
                <h6>@lang('app.cancel_appointment')
                <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="@lang('app.cancel_appointment_enable_disable')"></span></h6>
            </label>
            <br>
            <div class="switch">
              <label>
                @lang('app.no')
                <input type="hidden" name="cancel_appointment" value="0">
                <input type="checkbox" name="cancel_appointment" value="1"
                       {{ $agenda->cancel_appointment == '1' ? 'checked' : '' }}>
                <span class="lever"></span> @lang('app.yes')
              </label>
            </div>
        </div>
      </div>
        <br>

        <div class="row">
          <div class="col s12 m12 l12">
            <label for="anticipation_time_cancel">
                <h6>@lang('app.anticipation_time_cancel')
                <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="@lang('app.anticipation_time_cancel_description')"></span></h6>
            </label>
            <input type="text" class="col s12 m2 l2"
                   name="anticipation_time_cancel"
                   value="{{ $agenda ? $agenda->anticipation_time_cancel: '24' }}">
          </div>
        </div>

        <div class="row">
          <div class="col s12 m12 l12">
            <label for="cancel_with_confirmation_email">
                <h6>@lang('app.cancel_with_confirmation_email')</h6>
            </label>
            <br>
            <div class="switch">
              <label>
                @lang('app.no')
                <input type="hidden" name="cancel_with_confirmation_email" value="0">
                <input type="checkbox" name="cancel_with_confirmation_email" value="1"
                       {{ $agenda->cancel_with_confirmation_email == '1' ? 'checked' : '' }}>
                <span class="lever"></span> @lang('app.yes')
              </label>
            </div>
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col s12 m12 l12">
          <label for="time_for_activation">
              <h6>@lang('app.time_for_activation')
              <span class="fa fa-question-circle"
                    data-toggle="tooltip"
                    data-placement="top"
                    title="@lang('app.time_for_activation_description')"></span></h6>
          </label>
          <input type="text" class="col s12 m2 l2"
                 name="time_for_activation"
                 value="{{ $agenda ? $agenda->time_for_activation: '12' }}">
        </div>
      </div>

      <div class="row">
        <div class="col s12 m12 l12">
          <label for="limit_number_of_appointments">
              <h6>@lang('app.limit_number_of_appointments')</h6>
          </label>
          <br>
          <div class="switch">
            <label>
              @lang('app.no')
              <input type="hidden" name="limit_number_of_appointments" value="0">
              <input type="checkbox" name="limit_number_of_appointments" value="1"
                     {{ $agenda->limit_number_of_appointments == '1' ? 'checked' : '' }}>
              <span class="lever"></span> @lang('app.yes')
            </label>
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
