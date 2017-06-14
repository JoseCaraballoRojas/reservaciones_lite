<h1>{{ settings('app_name') }}</h1>

<p>@lang('app.confirm_cancel')</p>

<a href="{{ route('citas.confirmCancelEmail', $token) }}">@lang('app.cancelar_cita')</a> <br/><br/>

<p>@lang('app.if_you_cant_click')</p>

<p>{{ route('citas.confirmCancelEmail', $token) }}</p>

@lang('app.many_thanks'), <br/>
{{ settings('app_name') }}