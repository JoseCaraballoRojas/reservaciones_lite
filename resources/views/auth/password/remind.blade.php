@extends('materialize.auth')

@section('page-title', trans('app.reset_password'))

@section('content')
<br><br><br><br>
<div id="login-page" class="row">
  <div class="col s4  offset-s4 card-panel">
    <div class="form-wrap col l12 auth-form" id="login">
        <div class="input-field col s12 center">
          <img src="{{ url('assets/template/images/login-logo.png') }}"
              alt="{{ settings('app_name') }}"
              class="circle responsive-img valign profile-image-login">
          <p class="center login-form-text">
            <h5>@lang('app.forgot_your_password')</h5>
          </p>
        </div>


            @include('partials.messages')
          <form role="form" action="<?= url('password/remind') ?>" method="POST" id="remind-password-form" autocomplete="off">
              <input type="hidden" value="<?= csrf_token() ?>" name="_token">

              <div class="row margin">
                <div class="input-field col s12">
                  <i class="fa fa-envelope prefix" aria-hidden="true"></i>
                  <input type="email" name="email" id="email" class="form-control"
                         placeholder="@lang('app.your_email')">
                  <label for="password" class="sr-only">
                    @lang('app.email')
                  </label>
                </div>
              </div>
              <div class="row margin">
                <div class="input-field col s12 m12 l12">
                  <button type="submit" class="btn waves-effect waves-light col s12 btn-custom" id="btn-reset-password">
                     @lang('app.reset_password')
                 </button>
                </div>
              </div>
              <br>
          </form>

    </div>
  </div>
</div>

@stop

@section('scripts')
    {!! JsValidator::formRequest('Vanguard\Http\Requests\Auth\PasswordRemindRequest', '#remind-password-form') !!}
@stop
