@extends('materialize.auth')

@section('page-title', trans('app.login'))

@section('content')

<div id="login-page" class="row">
  <div class="col s4 z-depth-4 offset-s4 card-panel">
    <div class="form-wrap col l12 auth-form" id="login">
        <div class="input-field col s12 center">
          <img src="{{ url('assets/template/images/login-logo.png') }}"
              alt="{{ settings('app_name') }}"
              class="circle responsive-img valign profile-image-login">
          <p class="center login-form-text">Material Design Admin Template</p>
        </div>

        {{-- This will simply include partials/messages.blade.php view here --}}
        @include('partials/messages')

        <form role="form" action="<?= url('login') ?>" method="POST" id="login-form" autocomplete="off">
            <input type="hidden" value="<?= csrf_token() ?>" name="_token">

            @if (Input::has('to'))
                <input type="hidden" value="{{ Input::get('to') }}" name="to">
            @endif

            <div class="row margin">
              <div class="input-field col s12">
                <i class="mdi-social-person-outline prefix"></i>
                <input  type="email" name="username"  id="username"
                        placeholder="@lang('app.email_or_username')">
                <label for="username" class="center-align sr-only" >
                  @lang('app.email_or_username')
                </label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field password-field col s12">
                <i class="mdi-action-lock-outline prefix"></i>
                <input type="password" name="password" id="password"
                       placeholder="@lang('app.password')">
                <label for="password" class="sr-only">
                  @lang('app.password')
                </label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12 m12 l12  login-text">
                @if (settings('remember_me'))
                    <input type="checkbox" name="remember" id="remember" value="1"/>
                    <label for="remember">
                      @lang('app.remember_me')
                    </label>
                @endif
              </div>
            </div>
            <br>
            <div class="row margin">
              <div class="input-field col s12 m12 l12">
                <button type="submit" class="btn waves-effect waves-light col s12 btn-custom" id="btn-login">
                   @lang('app.log_in')
               </button>
              </div>
            </div>
            <div class="row margin">
              <div class="input-field col s12 m12 l6">
                @if (settings('reg_enabled'))
                    <p class="margin medium-small">
                      <a href="<?= url("register") ?>" >
                        @lang('app.dont_have_an_account')
                      </a>
                    </p>
                @endif
              </div>
              <div class="input-field col s12 m12 l6">
                @if (settings('forgot_password'))
                    <p class="margin right-align medium-small">
                      <a href="<?= url('password/remind') ?>" class="forgot">
                        @lang('app.i_forgot_my_password')
                      </a>
                  </p>
                @endif
              </div>
            </div>
            <br>
        </form>
        <div class="row margin">
          <div class="col s12 m12 l12 center"><p>OR</p></div>
        </div>
        <div class="divider"></div>
        <br>
       @include('auth.social.buttons')

    </div>
  </div>
</div>
@stop

@section('scripts')
    {!! HTML::script('assets/js/as/login.js') !!}
    {!! JsValidator::formRequest('Vanguard\Http\Requests\Auth\LoginRequest', '#login-form') !!}
@stop
