<div class="card-panel">
    <h4 class="header2">@lang('app.notifications_conf')</h4>
    <div class="card-content">
      {!! Form::open(['route' => ['agendas.configUpdate', $agenda], 'method' => 'PUT' ]) !!}
        <input type="hidden" name="id" value="{{ $agenda->id }}">

        <div class="row">
          <div class="col s12 m12 l12">
            <label for="notifications_email">
                <h6>@lang('app.notifications_email')
                  <span class="fa fa-question-circle"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="@lang('app.notifications_email_description')"></span></h6>
            </label>
            <div class="switch">
              <label>
                @lang('app.no')
                <input type="hidden" name="notifications_email" value="0">
                <input type="checkbox" name="notifications_email" value="1"
                       {{ $agenda->notifications_email == '1' ? 'checked' : '' }}>
                <span class="lever"></span> @lang('app.yes')
              </label>
            </div>
          </div>
        </div>
        <br>

      {{--  <div class="row">
          <div class="col s12 m12 l12">
            <label for="time_to_send_emails">
                <h6>@lang('app.time_to_send_emails')
                  <span class="fa fa-question-circle"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="@lang('app.time_to_send_emails_description')"></span></h6>
            </label>
            <input type="text" class="col s12 m2 l2"
                   name="time_to_send_emails"
                   value="{{ $agenda ? $agenda->time_to_send_emails : '3' }}">
          </div>
        </div>--}}
        <br>
        <div class="row">
          <div class="col s12 m12 l12">
            <label for="notifications_sms">
                <h6>@lang('app.notifications_sms')
                  <span class="fa fa-question-circle"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="@lang('app.notifications_sms_description')"></span></h6>
            </label>
            <div class="switch">
              <label>
                @lang('app.no')
                <input type="hidden" name="notifications_sms" value="0">
                <input type="checkbox" name="notifications_sms" value="1"
                       {{ $agenda->notifications_sms == '1' ? 'checked' : '' }}>
                <span class="lever"></span> @lang('app.yes')
              </label>
            </div>
          </div>
        </div>
        <br>

        <div class="row">
          <div class="col s12 m12 l12">
            <label for="time_to_send_sms">
                <h6>@lang('app.time_to_send_sms')
                  <span class="fa fa-question-circle"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="@lang('app.time_to_send_sms_description')"></span></h6>
            </label>
            <input type="text" class="col s12 m3 l3 timepicker"
                   name="time_to_send_sms"
                   value="{{ $agenda ? $agenda->time_to_send_sms :  '' }}"
                   id="timepicker" >
          </div>
        </div>


        <div class="row">
          <div class="col s12 m12 l12">
            <label for="email_copy">
                <h6>@lang('app.email_copy')
                  <span class="fa fa-question-circle"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="@lang('app.email_copy_description')"></span></h6>
            </label>
            <div class="switch">
              <label>
                @lang('app.no')
                <input type="hidden" name="email_copy" value="0">
                <input type="checkbox" name="email_copy" value="1"
                       {{ $agenda->email_copy == '1' ? 'checked' : '' }}>
                <span class="lever"></span> @lang('app.yes')
              </label>
            </div>
          </div>
        </div>
        <br>

        <div class="row">
          <div class="col s12 ">
            <div class="row">
              <div class="finput-field col s10">
                <label for="email_copy_receiver">
                    <h6>@lang('app.email_copy_receiver')</h6></label>
                {!! Form::select('email_copy_receiver',
                  ['1' => 'Administrador', '2' => 'Contacto sucursal', '3' => 'Contacto area'],
                  $agenda ? $agenda->email_copy_receiver : '',
                  ['placeholder' => 'Selecione...', 'required'  ]) !!}
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
