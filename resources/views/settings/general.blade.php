@extends('materialize.template')

@section('page-title', trans('app.general_settings'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          @lang('app.general_settings')
          <small>@lang('app.manage_general_system_settings')</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li><a href="javascript:;">@lang('app.settings')</a></li>
          <li class="active">@lang('app.general')</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

@include('partials.messages')
<div class="divider"></div>
<br>
{!! Form::open(['route' => 'settings.general.update', 'id' => 'general-settings-form']) !!}

<div class="row">
  <div class="col s12 m6 l6">
      <div class="card-panel">
          <h4 class="header2">@lang('app.general_app_settings')</h4>
            <div class="card-content">
                <div class="form-group">
                    <label for="name">@lang('app.name')</label>
                    <input type="text" class="form-control" id="app_name"
                           name="app_name" value="{{ settings('app_name') }}">
                </div>

                <button type="submit" class="btn cyan waves-effect waves-light">
                    <i class="fa fa-refresh"></i>
                    @lang('app.update_settings')
                </button>
            </div>
        </div>
    </div>
</div>

@stop
