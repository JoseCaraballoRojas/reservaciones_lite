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
                    <label for="lock_time">
                    <h6>@lang('app.appointments_customer_per_day')
                    <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="@lang('app.appointments_customer_per_day_description')">
                    </span>
                    </h6>
                  </label>
                    {!! Form::number('appointments_customer_per_day',
                              settings('appointments_customer_per_day'),
                         ['placeholder' => '2', 'required'  ]) !!}
                </div>
                <br>

                <div class="form-group">
                    <label for="lock_time">
                    <h6>@lang('app.max_months_future_to_schedule')
                    <span class="fa fa-question-circle"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="@lang('app.max_months_future_to_schedule_description')">
                    </span>
                    </h6>
                  </label>
                    {!! Form::number('max_months_future_to_schedule',
                              settings('max_months_future_to_schedule'),
                         ['placeholder' => '3', 'required'  ]) !!}
                </div>

                <button type="submit" class="btn cyan waves-effect waves-light">
                    <i class="fa fa-refresh"></i>
                    @lang('app.update_reservaciones')
                </button>
            </div>
        </div>
    </div>
</div>

@stop
