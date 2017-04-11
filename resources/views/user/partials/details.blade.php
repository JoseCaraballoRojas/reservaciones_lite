<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
            <h4 class="header2">@lang('app.user_details')</h4>
               <div class="row">
                 <div class="col s6">
                   <div class="row">
                     <div class="finput-field col s12">
                       <label for="first_name">@lang('app.role')</label>
                       {!! Form::select('role', $roles, $edit ? $user->roles->first()->id : '',
                           ['id' => 'role', $profile ? 'disabled' : '']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="finput-field col s12">
                        <label for="status">@lang('app.status')</label>
                        {!! Form::select('status', $statuses, $edit ? $user->status : '',
                            ['id' => 'status', $profile ? 'disabled' : '']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="finput-field col s12">
                        <label for="first_name">@lang('app.first_name')</label>
                        <input type="text" id="first_name"
                               name="first_name" placeholder="@lang('app.first_name')"
                               value="{{ $edit ? $user->first_name : '' }}">
                      </div>
                    </div>
                    <div class="row">
                      <div class="finput-field col s12">
                        <label for="last_name">@lang('app.last_name')</label>
                        <input type="text"  id="last_name"
                               name="last_name" placeholder="@lang('app.last_name')"
                               value="{{ $edit ? $user->last_name : '' }}">
                      </div>
                    </div>
                  </div>

                  <div class="col s6">
                    <div class="row">
                      <div class="finput-field col s12">
                        <label for="birthday">@lang('app.date_of_birth')</label>
                        <div class="">
                            <div class='input-group date'>
                                <input type='text' name="birthday" id='birthday'
                                value="{{ $edit ? $user->birthday : '' }}"  />
                                <span class="input-group-addon" style="cursor: default;">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="finput-field col s12">
                        <label for="phone">@lang('app.phone')</label>
                        <input type="text"  id="phone"
                               name="phone" placeholder="@lang('app.phone')"
                               value="{{ $edit ? $user->phone : '' }}">
                      </div>
                    </div>

                    <div class="row">
                      <div class="finput-field col s12">
                        <label for="address">@lang('app.address')</label>
                        <input type="text"  id="address"
                               name="address" placeholder="@lang('app.address')"
                               value="{{ $edit ? $user->address : '' }}">
                      </div>
                    </div>

                    <div class="row">
                      <div class="finput-field col s12">
                        <label for="address">@lang('app.country')</label>
                        {!! Form::select('country_id',
                          $countries, $edit ? $user->country_id : '') !!}
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
