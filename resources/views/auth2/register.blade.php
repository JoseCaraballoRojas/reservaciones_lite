@extends('materialize.auth')

@section('page-title', trans('app.sign_up'))

@if (settings('registration.captcha.enabled'))
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endif

@section('content')
<div id="login-page" class="row">
  <div class="col s4  offset-s4 card-panel">
    <div class="form-wrap col l12 auth-form" >
      <div class="input-field col s12 center">
        <img src="{{ url('assets/template/images/login-logo.png') }}"
            alt="{{ settings('app_name') }}"
            class="circle responsive-img valign profile-image-login">
      </div>



        @include('partials/messages')

        <form role="form" action="<?= url('register') ?>" method="post" id="registration-form" autocomplete="off">
            <input type="hidden" value="<?= csrf_token() ?>" name="_token">

            <div class="row margin">
              <div class="input-field col s12">
                <i class="fa fa-envelope prefix"></i>
                <input type="email" name="email" id="email"
                       placeholder="@lang('app.email')"
                       value="{{ old('email') }}" >
                <label for="email" class="center-align sr-only" >
                  @lang('app.email')
                </label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12">
                <i class="fa fa-user prefix"></i>
                <input type="text" name="username" id="username"
                       placeholder="@lang('app.username')"
                       value="{{ old('username') }}">
                <label for="username" class="center-align sr-only" >
                  @lang('app.username')
                </label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12">
                <i class="mdi-action-lock-outline prefix" aria-hidden="true"></i>
                <input type="password" name="password" id="password"
                       placeholder="@lang('app.password')">
                <label for="password" class="sr-only">
                  @lang('app.password')
                </label>
              </div>
            </div>

            <div class="row margin">
              <div class="input-field col s12">
                <i class="mdi-action-lock-outline prefix" aria-hidden="true"></i>
                <input type="password" name="password_confirmation" id="password_confirmation"
                       placeholder="@lang('app.confirm_password')">
                <label for="password" class="sr-only">
                  @lang('app.confirm_password')
                </label>
              </div>
            </div>

            @if (settings('tos'))
              <div class="row margin">
                <div class="input-field col s12 m12 l12  login-text">
                    <input type="checkbox" name="tos" id="tos" value="1"/>
                    <label for="tos">
                      @lang('app.i_accept')
                      <a href="#tos-modal" data-toggle="modal">
                        @lang('app.terms_of_service')
                      </a>
                    </label>
                </div>
              </div>
              <br>
            @endif

            {{-- Only display captcha if it is enabled --}}
            @if (settings('registration.captcha.enabled'))
              <div class="row margin">
                <div class="input-field col s12 m12 l12  login-text">
                    {!! app('captcha')->display() !!}
                </div>
              </div>
            @endif
            {{-- end captcha --}}

            <div class="row margin">
              <div class="input-field col s12 m12 l12">
                <button type="submit" class="btn waves-effect waves-light col s12 btn-custom" id="btn-login">
                   @lang('app.register')
               </button>
              </div>
            </div>

        </form>
        <div class="row margin">
          <div class="col s12 m12 l12 center"><p>OR</p></div>
        </div>
        <div class="divider"></div>
        <br>
        @include('auth2.social.buttons')

    </div>
  </div>
</div>

    @if (settings('tos'))
        <div class="modal fade" id="tos-modal" tabindex="-1" role="dialog" aria-labelledby="tos-label">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="@lang('app.terms_of_service')">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h3 class="modal-title" id="tos-label">@lang('app.terms_of_service')</h3>
                    </div>
                    <div class="modal-body">
                        <h4>1. Terms</h4>

                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                            Donec quis lacus porttitor, dignissim nibh sit amet, fermentum felis.
                            Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere
                            cubilia Curae; In ultricies consectetur viverra. Nullam velit neque,
                            placerat condimentum tempus tincidunt, placerat eu lectus. Nam molestie
                            porta purus, et pretium risus vehicula in. Cras sem ipsum, varius sagittis
                            rhoncus nec, dictum maximus diam. Duis ac laoreet est. In turpis velit, placerat
                            eget nisi vitae, dignissim tristique nisl. Curabitur sollicitudin, nunc ut
                            viverra interdum, lacus...
                        </p>

                        <h4>2. Use License</h4>

                        <ol type="a">
                            <li>
                                Aenean vehicula erat eu nisi scelerisque, a mattis purus blandit. Curabitur congue
                                ollis nisl malesuada egestas. Lorem ipsum dolor sit amet, consectetur adipiscing elit:
                            </li>
                        </ol>

                        <p>...</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('app.close')</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

@stop

@section('scripts')
    {!! JsValidator::formRequest('Vanguard\Http\Requests\Auth\RegisterRequest', '#registration-form') !!}
@stop