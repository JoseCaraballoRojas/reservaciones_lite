@extends('materialize.auth')

@section('page-title', trans('app.two_factor_authentication'))

@section('content')

<div id="login-page" class="row">
  <div class="col s4  offset-s4 card-panel">
      <div class="form-wrap col l12 auth-form" >
          <h1>@lang('app.two_factor_authentication')</h1>

          @include('partials.messages')

          <form role="form" action="<?= route('auth.token.validate') ?>" method="POST" autocomplete="off">
              <input type="hidden" value="<?= csrf_token() ?>" name="_token">

              <div class="row margin">
                <div class="input-field col s12">
                  <i class="fa fa-lock prefix"></i>
                  <input type="text" name="token" id="token"
                         placeholder="@lang('app.authy_2fa_token')">
                  <label for="password" class="sr-only">
                    @lang('app.token')
                  </label>
                </div>
              </div>

              <div class="row margin">
                <div class="input-field col s12 m12 l12">
                  <button type="submit" class="btn waves-effect waves-light col s12 btn-custom" id="btn-reset-password">
                    @lang('app.validate')
                  </button>
                </div>
              </div>

          </form>
      </div>
  </div>
</div>

@stop
