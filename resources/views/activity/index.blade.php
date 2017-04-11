@extends('materialize.template')

@section('page-title', trans('app.activity_log'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          {{ isset($user) ? $user->present()->nameOrEmail : trans('app.activity_log') }}
          <small>{{ isset($user) ? trans('app.activity_log_sm') : trans('app.activity_log_all_users') }}</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          @if (isset($user) && isset($adminView))
              <li><a href="{{ route('activity.index') }}">@lang('app.activity_log')</a></li>
              <li class="active">{{ $user->present()->nameOrEmail }}</li>
          @else
              <li class="active">@lang('app.activity_log')</li>
          @endif
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

<div id="search-bar" class="section">
  <div class="row">
    <div class="col s12 m8 l4">
      <nav class="grey ">
        <div class="nav-wrapper">
          <div class="col s12 ">
            <form class="row" method="GET" action="" accept-charset="UTF-8" id="users-form">
              <a href="#" class="button-collapse">
                <i class="mdi-navigation-menu"></i>
              </a>
              <ul class="hide-on-med-and-down">
                <li>
                  <div class="">
                    <a href="#" type="submit" id="search-activities-btn">
                        <i class="mdi-action-search"></i>
                    </a>
                  </div>
                </li>
                <li>
                  <div class="input-field">
                    <input id="search" type="text" required="" name="search"
                      value="{{ Input::get('search') }}" placeholder="@lang('app.search_for_action')">
                  </div>
                </li>
                <li>
                  @if (Input::has('search') && Input::get('search') != '')
                  <div class="">
                    <a href="{{ route('activity.index') }}" class="red" type="button">
                        <span class="mdi-content-clear"></span>
                    </a>
                  </div>
                  @endif
                </li>
              </ul>
            </form>
          </div>
        </div>
      </nav>
    </div>
  </div>
</div>


<div class="responsive-table top-border-table">
    <table class="responsive-table striped bordered">
        <thead>
            @if (isset($adminView))
                <th>@lang('app.user')</th>
            @endif
            <th>@lang('app.ip_address')</th>
            <th>@lang('app.message')</th>
            <th>@lang('app.log_time')</th>
            <th class="text-center">@lang('app.more_info')</th>
        </thead>
        <tbody>
            @foreach ($activities as $activity)
                <tr>
                    @if (isset($adminView))
                        <td>
                            @if (isset($user))
                                {{ $activity->user->present()->nameOrEmail }}
                            @else
                                <a href="{{ route('activity.user', $activity->user_id) }}"
                                    data-toggle="tooltip" title="@lang('app.view_activity_log')">
                                    {{ $activity->user->present()->nameOrEmail }}
                                </a>
                            @endif
                        </td>
                    @endif
                    <td>{{ $activity->ip_address }}</td>
                    <td>{{ $activity->description }}</td>
                    <td>{{ $activity->created_at->format('Y-m-d H:i:s') }}</td>
                    <td class="text-center">
                        <a tabindex="0" role="button"
                        class="btn-floating  waves-effect waves-light blue"
                           data-trigger="focus"
                           data-placement="left"
                           data-toggle="popover"
                           title="@lang('app.user_agent')"
                           data-content="{{ $activity->user_agent }}">
                            <i class="mdi-action-info-outline"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {!! $activities->render() !!}
</div>

@stop
