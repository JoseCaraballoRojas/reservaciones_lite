<div class="card-panel">
    <h4 class="header2">@lang('app.config_agendas')</h4>
    <div class="card-content">
      {!! Form::open(['route' => ['agendas.configUpdate', $agenda], 'method' => 'PUT' ]) !!}
        <input type="hidden" name="id" value="{{ $agenda->id }}">

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
                <input type="hidden" name="appointment_approval" value="0">
                <input type="checkbox" name="appointment_approval" value="1"
                       {{ settings('appointment_approval') ? 'checked' : '' }}>
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
                {!! Form::select('appointment_approval_user', ['1' =>'Administrador', '2' => 'Conctato sucursal', '3' => 'Contacto area', '4' => 'Usuario agenda'], null,
                  ['placeholder' => 'Selecione un responsable...', 'required'  ]) !!}
               </div>
             </div>
           </div>
        </div>


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
                <input type="hidden" name="estatus_agenda" value="0">
                <input type="checkbox" name="estatus_agenda" value="1"
                       {{ settings('estatus_agenda') ? 'checked' : '' }}>
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
                {!! Form::select('type_reservation', ['cita' => 'Cita', 'turno' => 'Turno'], null,
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
                {!! Form::select('type_reservation_day_or_time', ['day' => 'Dia', 'time' => 'Horario'], null,
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

        <div class="row">
          <div class="col s12 m12 l12">
            <label for="visible_shifts">
                <h6>@lang('app.visible_shifts')
                  <span class="fa fa-question-circle"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="@lang('app.visible_shifts_description')"></span></h6>
            </label>
            <div class="switch">
              <label>
                @lang('app.no')
                <input type="hidden" name="visible_shifts" value="0">
                <input type="checkbox" name="visible_shifts" value="1"
                       {{ settings('visible_shifts') ? 'checked' : '' }}>
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
