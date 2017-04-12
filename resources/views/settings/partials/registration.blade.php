<div class="card-panel">
    <h4 class="header2">@lang('app.general')</h4>
    <div class="card-content">
        {!! Form::open(['route' => 'settings.auth.update', 'id' => 'registration-settings-form']) !!}

        <div class="form-group">
            <label for="reg_enabled">
              <h6>@lang('app.allow_registration')</h6>
            </label>
            <br>
            <div class="switch">
              <label>
                @lang('app.no')
                <input type="hidden" name="reg_enabled" value="0">
                <input type="checkbox" name="reg_enabled" value="1"
                       {{ settings('reg_enabled') ? 'checked' : '' }}>
                <span class="lever"></span>@lang('app.yes')
              </label>
            </div>
            {{--<input type="hidden" name="reg_enabled" value="0">
            <input type="checkbox" name="reg_enabled"
                   class="switch" data-on-text="@lang('app.yes')" d
                   ata-off-text="@lang('app.no')" value="1"
                    {!! settings('reg_enabled') ? 'checked' : '' !!}>--}}
        </div>
        <br>

        <div class="form-group">
            <label for="forgot_password">
                <h6>@lang('app.terms_and_conditions')
                <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="@lang('app.the_user_has_to_confirm')"></span></h6>
            </label>
            <br>
            <div class="switch">
              <label>
                @lang('app.no')
                <input type="hidden" name="tos" value="0">
                <input type="checkbox" name="tos" value="1"
                       {{ settings('tos') ? 'checked' : '' }}>
                <span class="lever"></span>@lang('app.yes')
              </label>
            </div>
            {{--<input type="hidden" name="tos" value="0">
            {!! Form::checkbox('tos', 1, settings('tos'),
                ['class' => 'switch', 'data-on-text' => trans('app.yes'),
                'data-off-text' => trans('app.no')]) !!}--}}
        </div>
        <br>

        <div class="form-group">
            <label for="reg_email_confirmation">
              <h6>@lang('app.email_confirmation')</h6>
            </label>
            <br>
            <div class="switch">
              <label>
                OFF
                <input type="hidden" name="reg_email_confirmation" value="0">
                <input type="checkbox" name="reg_email_confirmation" value="1"
                       {{ settings('reg_email_confirmation') ? 'checked' : '' }}>
                <span class="lever"></span>ON
              </label>
            </div>
            {{--<input type="hidden" name="reg_email_confirmation" value="0">
            {!! Form::checkbox('reg_email_confirmation', 1,
              settings('reg_email_confirmation'), ['class' => 'switch']) !!}--}}
        </div>
        <br>

        <button type="submit" class="btn cyan waves-effect waves-light">
            <i class="fa fa-refresh"></i>
            @lang('app.update_settings')
        </button>
        {!! Form::close() !!}
    </div>
</div>
