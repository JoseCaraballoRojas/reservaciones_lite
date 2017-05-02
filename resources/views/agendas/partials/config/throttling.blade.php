<div class="card-panel">
    <h4 class="header2">@lang('app.authentication_throttling')</h4>
    <div class="card-content">
        {!! Form::open(['route' => 'settings.auth.update', 'id' => 'auth-throttle-settings-form']) !!}

        <div class="form-group">
              <label>
                <h6> @lang('app.throttle_authentication')</h6>
              </label>
              <br>
              <div class="switch">
                <label>
                  @lang('app.no')
                  <input type="hidden" name="throttle_enabled" value="0">
                  <input type="checkbox"name="throttle_enabled" value="1" {{ settings('throttle_enabled') ? 'checked' : '' }}>
                  <span class="lever"></span> @lang('app.yes')
                </label>
              </div>
          </div>
        <br>

        <div class="form-group">
            <label for="throttle_attempts">
                <h6>@lang('app.maximum_number_of_attempts')
                <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="@lang('app.max_number_of_incorrect_login_attempts')"></span></h6>
            </label>
            <input type="text" name="throttle_attempts" class="form-control"
                   value="{{ settings('throttle_attempts', 10) }}">
        </div>


        <div class="form-group">
            <label for="throttle_lockout_time">
                <h6>@lang('app.lockout_time')
                <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="@lang('app.num_of_minutes_to_lock_the_user')"></span></h6>
            </label>
            <input type="text" name="throttle_lockout_time" class="form-control"
                   value="{{ settings('throttle_lockout_time', 1) }}">
        </div>
        <br>
        <button type="submit" class="btn cyan waves-effect waves-light">
            <i class="fa fa-refresh"></i>
            @lang('app.update_settings')
        </button>

        {!! Form::close() !!}
    </div>
</div>
