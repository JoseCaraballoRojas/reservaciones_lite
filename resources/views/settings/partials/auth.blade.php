<div class="card-panel">
    <h4 class="header2">@lang('app.general')</h4>
    <div class="card-content">
        {!! Form::open(['route' => 'settings.auth.update', 'id' => 'auth-general-settings-form']) !!}

        <div class="form-group">
            <label for="remember_me">
                <h6>@lang('app.allow_remember_me')
                <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="@lang('app.should_remember_me_be_displayed')"></span></h6>
            </label>
            <br>
            <div class="switch">
              <label>
                @lang('app.no')
                <input type="hidden" name="remember_me" value="0">
                <input type="checkbox" name="remember_me" value="1"
                       {{ settings('remember_me') ? 'checked' : '' }}>
                <span class="lever"></span> @lang('app.yes')
              </label>
            </div>
        </div>
        <br>

        <div class="form-group">
            <label for="forgot_password">
                <h6>@lang('app.forgot_password')
                <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="@lang('app.enable_disable_forgot_password')"></span></h6>
            </label>
            <br>
            <div class="switch">
              <label>
                @lang('app.no')
                <input type="hidden" name="forgot_password" value="0">
                <input type="checkbox" name="forgot_password" value="1"
                       {{ settings('forgot_password') ? 'checked' : '' }}>
                <span class="lever"></span> @lang('app.yes')
              </label>
            </div>
        </div>
        <br>

        <div class="form-group">
            <label for="login_reset_token_lifetime">
                <h6>@lang('app.reset_token_lifetime')
                <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="@lang('app.number_of_minutes')"></span></h6>
            </label>
            <input type="text"
                   name="login_reset_token_lifetime"
                   value="{{ settings('login_reset_token_lifetime', 30) }}">

        </div>
        <br>

        <button type="submit" class="btn cyan waves-effect waves-light">
            <i class="fa fa-refresh"></i>
            @lang('app.update_settings')
        </button>

        {!! Form::close() !!}
    </div>
</div>
