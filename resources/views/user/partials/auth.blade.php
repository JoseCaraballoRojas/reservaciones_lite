<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2">@lang('app.login_details')</h4>
               <div class="row">
                 <div class="col s12">
                   <div class="row">
                     <div class="finput-field col s12">
                       <label for="email">@lang('app.email')</label>
                       <input type="email" id="email"
                              name="email" placeholder="@lang('app.email')"
                              value="{{ $edit ? $user->email : '' }}">
                      </div>
                    </div>
                    <div class="row">
                      <div class="finput-field col s12">
                        <label for="username">@lang('app.username')</label>
                        <input type="text" id="username"
                               placeholder="(@lang('app.optional'))"
                               name="username"
                               value="{{ $edit ? $user->username : '' }}">
                     </div>
                    </div>
                    <div class="row">
                      <div class="finput-field col s12">
                        <label for="password">
                          {{ $edit ? trans("app.new_password") : trans('app.password') }}
                        </label>
                        <input type="password" id="password"
                               name="password"
                               @if ($edit)
                                 placeholder="@lang('app.leave_blank_if_you_dont_want_to_change')"
                              @endif>
                      </div>
                    </div>
                    <div class="row">
                      <div class="finput-field col s12">
                        <label for="password_confirmation">
                          {{ $edit ? trans("app.confirm_new_password") : trans('app.confirm_password') }}
                        </label>
                        <input type="password"  id="password_confirmation"
                               name="password_confirmation"
                               @if ($edit)
                                 placeholder="@lang('app.leave_blank_if_you_dont_want_to_change')"
                               @endif>
                      </div>
                    </div>
                  </div>
                @if ($edit)
                  <div class="col s12 ">
                      <div class="input-field col s4">
                        <div class="input-field col s12">
                          <button type="submit" class="btn cyan waves-effect waves-light">
                              <i class="mdi-content-save"></i>
                                @lang('app.update_details')
                          </button>
                        </div>
                    </div>
                  </div>
                @endif
            </div>
        </div>
    </div>
</div>
