@extends('materialize.template')

@section('page-title', trans('app.notification_settings'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          @lang('app.notification_settings')
          <small>@lang('app.manage_system_notification_settings')</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li><a href="javascript:;">@lang('app.settings')</a></li>
          <li class="active">@lang('app.notifications')</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

@include('partials.messages')
<div class="divider"></div>
<br>

<div class="row">
  <div class="col s12 m4 l8">
      <div class="card-panel">
          <h4 class="header2">@lang('app.email_notifications')</h4>
            <div class="card-content">
                {!! Form::open(['route' => 'settings.notifications.update',
                                'id' => 'notification-settings-form']) !!}
                  <div class="form-group">
                        <label for="notifications_signup_email">
                          <h6> @lang('app.notify_admin_when_user_signs_up')</h6>
                        </label>
                        <br>
                        <div class="switch">
                          <label>
                            @lang('app.no')
                            <input type="hidden" name="notifications_signup_email" value="0">
                            <input type="checkbox"name="notifications_signup_email" value="1"
                                   {{ settings('notifications_signup_email') ? 'checked' : '' }}>
                            <span class="lever"></span> @lang('app.yes')
                          </label>
                        </div>
                    </div>
                    <br>
                    <!-- Switch -->

                    <button type="submit" class="btn cyan waves-effect waves-light">
                        <i class="fa fa-refresh"></i>
                        @lang('app.update_settings')
                    </button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

@stop
