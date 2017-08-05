<h1>{{ settings('app_name') }}</h1>

<p>@lang('app.appointment_notification_days') {{ $dias }} @lang('app.days') </p>

<p>@lang('app.appointment_notification') </p>{{ $fecha }}

@lang('app.many_thanks'), <br/>
{{ settings('app_name') }}
