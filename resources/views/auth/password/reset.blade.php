@extends('materialize.auth')

@section('page-title', trans('app.reset_password'))

@section('content')
<div id="login-page" class="row">
  <div class="col s4  offset-s4 card-panel">
    <div class="form-wrap col 12 auth-form">
      <div class="input-field col s12 center">
        <img src="{{ url('assets/template/images/login-logo.png') }}"
            alt="{{ settings('app_name') }}"
            class="circle responsive-img valign profile-image-login">
        <p class="center login-form-text">
          <h5>@lang('app.reset_your_password')</h5>
        </p>
      </div>


        @include('partials.messages')

        <form role="form" action="{{ url('password/reset') }}" method="POST" id="reset-password-form" autocomplete="off">

             {{ csrf_field() }}
            <input type="hidden" name="token" value="{{ $token }}">

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
              <div class="input-field col s12">
                <i class="fa fa-lock prefix" aria-hidden="true"></i>
                <input  type="password" name="password" id="password"
                       placeholder="@lang('app.new_password')">
                <label for="password" class="sr-only">
                  @lang('app.new_password')
                </label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12">
                <i class="fa fa-lock prefix" aria-hidden="true"></i>
                <input  type="password" name="password_confirmation" id="password_confirmation"
                       placeholder="@lang('app.confirm_new_password')">
                <label for="password" class="sr-only">
                  @lang('app.confirm_new_password')
                </label>
              </div>
            </div>
            <div class="row margin">
              <div class="input-field col s12 m12 l12">
                <button type="submit" class="btn waves-effect waves-light col s12 btn-custom" id="btn-reset-password">
                     @lang('app.update_password')
               </button>
              </div>
            </div>
            <br>
        </form>
    </div>
  </div>
</div>

@stop
