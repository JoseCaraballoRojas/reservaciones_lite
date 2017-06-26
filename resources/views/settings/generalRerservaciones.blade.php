@extends('materialize.template')

@section('page-title', trans('app.general_settings_reservaciones'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          @lang('app.general_settings_reservaciones')
          <small>@lang('app.general_app_settings')</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li><a href="javascript:;">@lang('app.settings')</a></li>
          <li class="active">@lang('app.reservaciones')</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

@include('partials.messages')
<div class="divider"></div>
<br>
{!! Form::open(['route' => 'settings.rerservacionesUpdate', 'id' => 'general-settings-form']) !!}

<div class="row">
  <div class="col s12 m6 l6">
      <div class="card-panel">
          <h4 class="header2">@lang('app.general_settings_reservaciones')</h4>
            <div class="card-content">
                <div class="form-group">
                    {!! Form::label('time_zone', @trans('app.time_zone')) !!}
                    {!! Form::select('time_zone', $timezones, null,
                         ['placeholder' => 'selecione una zona horaria...', 'required'  ]) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('date_format', @trans('app.date_format')) !!}
                    {!! Form::select('date_format', ['YYYY-MM-DD' => 'YYYY-MM-DD', 'DD-MM-YYYY' => 'DD-MM-YYYY'], null,
                         ['placeholder' => 'selecione un formato de fecha...', 'required'  ]) !!}
                </div>
                <br>
                <div class="form-group">
                  <label for="email_send">
                    <h6>@lang('app.email_send')
                    <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="@lang('app.email_send_details')">
                    </span>
                    </h6>
                  </label>
                <br>
                <div class="switch">
                  <label>
                    @lang('app.no')
                    <input type="hidden" name="email_send" value="0">
                    <input type="checkbox" name="email_send" value="1"
                           {{ settings('email_send') ? 'checked' : '' }}>
                    <span class="lever"></span> @lang('app.yes')
                  </label>
                </div>
              </div>
              <br>
                <button type="submit" class="btn cyan waves-effect waves-light">
                    <i class="fa fa-refresh"></i>
                    @lang('app.update_reservaciones')
                </button>
            </div>
        </div>
    </div>
</div>

@stop
