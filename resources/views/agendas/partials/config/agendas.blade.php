<div class="card-panel">
    <h4 class="header2">@lang('app.config_agendas')</h4>
    <div class="card-content">
        {!! Form::open(['route' => 'settings.auth.update', 'id' => 'registration-settings-form']) !!}

        <div class="row">
          <div class="col s12 m12 l12">
            <label for="Appointment_approval">
                <h6>@lang('app.Appointment_approval')
                  <span class="fa fa-question-circle"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="@lang('app.Appointment_approval_description')"></span></h6>
            </label>
            <div class="switch">
              <label>
                @lang('app.no')
                <input type="hidden" name="Appointment_approval" value="0">
                <input type="checkbox" name="Appointment_approval" value="1"
                       {{ settings('Appointment_approval') ? 'checked' : '' }}>
                <span class="lever"></span> @lang('app.yes')
              </label>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col s12">
            <div class="row">
              <div class="finput-field col s10">
                <label for="Appointment_approval_user">
                    <h6>@lang('app.Appointment_approval_user')</h6></label>
                {!! Form::select('Appointment_approval_user', ['Administrador', 'Conctato sucursal', 'Contacto area', 'Usuario agenda'], null,
                  ['placeholder' => 'Selecione un responsable...', 'required'  ]) !!}
               </div>
             </div>
           </div>
        </div>
        <br>

        <div class="row">
          <div class="col s12 m12 l12">
            <label for="status">
                <h6>@lang('app.status')
                  <span class="fa fa-question-circle"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="@lang('app.status_description')"></span></h6>
            </label>
            <div class="switch">
              <label>
                @lang('app.inactive')
                <input type="hidden" name="Appointment_approval" value="0">
                <input type="checkbox" name="Appointment_approval" value="1"
                       {{ settings('Appointment_approval') ? 'checked' : '' }}>
                <span class="lever"></span> @lang('app.active')
              </label>
            </div>
          </div>
        </div>
        <br>

        <div class="row">
          <div class="col s12">
            <div class="row">
              <div class="finput-field col s10">
                <label for="type_reservation">
                    <h6>@lang('app.type_reservation')</h6></label>
                {!! Form::select('type_reservation', ['Cita', 'Turno'], null,
                  ['placeholder' => 'Selecione un tipo...', 'required'  ]) !!}
               </div>
             </div>
           </div>
        </div>

        <div class="row">
          <div class="col s12">
            <div class="row">
              <div class="finput-field col s10">
                <label for="type_reservation_day_or_time">
                    <h6>@lang('app.type_reservation_day_or_time')</h6></label>
                {!! Form::select('type_reservation_day_or_time', ['Dia', 'Horario'], null,
                  ['placeholder' => 'Selecione...', 'required'  ]) !!}
               </div>
             </div>
           </div>
        </div>

        <div class="row">
          <div class="col s12 m12 l12">
            <label for="max_number_shifts_per_day">
                <h6>@lang('app.max_number_shifts_per_day')
                <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="@lang('app.max_number_shifts_per_day_description')"></span></h6>
            </label>
            <input type="text" class="col s12 m2 l2"
                   name="max_number_shifts_per_day"
                   value="{{ settings('max_number_shifts_per_day', 10) }}">
          </div>
        </div>
        <br>

        {!! Form::close() !!}
    </div>
</div>
