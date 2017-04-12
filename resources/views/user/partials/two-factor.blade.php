<div class="card-panel">
    <h4 class="header2">@lang('app.two_factor_authentication')</h4>
    <div class="row">
        @if (! Authy::isEnabled($user))
          <div class="row">
              <div class="col l12">
                <div class="input-field col s12">
                  <div class="card-alert light-blue lighten-5">
                    <div class="card-content light-blue-tex">
                      @lang('app.in_order_to_enable_2fa_you_must')
                      <a target="_blank" href="https://www.authy.com/">Authy</a>
                       @lang('app.application_on_your_phone').
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="divider"></div>
            <div class="row">
                <div class="col l6">
                    <div class="input-field col s12">
                        <label for="country_code">@lang('app.country_code')</label>
                        <input type="text"  id="country_code" placeholder="381"
                               name="country_code" value="{{ $user->two_factor_country_code }}">
                    </div>
                </div>
                <div class="col l6">
                    <div class="input-field col s12">
                        <label for="phone_number">@lang('app.cell_phone')</label>
                        <input type="text" id="phone_number" placeholder="@lang('app.phone_without_country_code')"
                               name="phone_number" value="{{ $user->two_factor_phone }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col l12">
                    <div class="input-field col s12">
                      <button type="submit" class="btn cyan waves-effect waves-light"
                              data-toggle="loader" data-loading-text="@lang('app.enabling')">
                          <i class="fa fa-phone"></i>
                          @lang('app.enable')
                      </button>
                    </div>
              </div>
          </div>
        @else
          <div class="row">
              <div class="col l12">
                  <div class="input-field col s12">
                      <button type="submit" class="btn waves-effect waves-light red darken-2"
                              data-toggle="loader" data-loading-text="@lang('app.disabling')">
                          <i class="fa fa-close"></i>
                          @lang('app.disable')
                      </button>
                    </div>
              </div>
          </div
        @endif
    </div>
</div>
