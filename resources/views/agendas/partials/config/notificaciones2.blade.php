<div class="card-panel">
    <h4 class="header2">@lang('app.notifications_conf_sms')</h4>
    <div class="card-content">
      {!! Form::open(['route' => ['agendas.configUpdate', $agenda], 'method' => 'PUT' ]) !!}
        <input type="hidden" name="id" value="{{ $agenda->id }}">
        <div class="row">
          <div class="input-field col s12">
            <textarea id="textarea2" class="materialize-textarea" length="160"

            name="message_sms" required >{{ $agenda ? $agenda->message_sms : '' }}</textarea>
            <label for="textarea1">Contenido del sms informativo</label>
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
