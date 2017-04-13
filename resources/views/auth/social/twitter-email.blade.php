@extends('materialize.auth')

@section('content')
  <div id="login-page" class="row">
    <div class="col s4  offset-s4 card-panel">
    <div class="form-wrap col s6  auth-form">
        <h1>@lang('app.hey') {{ $account->getName() }},</h1>

        <div id="card-alert" class="card orange lighten-5">
          <div class="card-content orange-text">
            <strong>@lang('app.one_more_thing')...</strong>
            @lang('app.twitter_does_not_provide_email')
          </div>
        </div>

        @include('partials.messages')

        <form role="form" action="<?= url('auth/twitter/email') ?>" method="POST" id="email-form" autocomplete="off">
            <input type="hidden" value="<?= csrf_token() ?>" name="_token">

            <div class="row margin">
              <div class="input-field col s12">
                <i class="fa fa-at prefix"></i>
                <input type="email" name="email" id="email"
                       placeholder="@lang('app.your_email')">
                <label for="password" class="sr-only">
                  @lang('app.email')
                </label>
              </div>
            </div>
            <div class="row margin">
              <div class="input-field col s12 m12 l12">
                <button type="submit" class="btn waves-effect waves-light col s12 btn-custom">
                  @lang('app.log_me_in')
                </button>
              </div>
            </div>
        </form>
    </div>
  </div>
</div>

@stop

@section('scripts')
    {!! JsValidator::formRequest('Vanguard\Http\Requests\Auth\Social\SaveEmailRequest', '#email-form') !!}
@stop
