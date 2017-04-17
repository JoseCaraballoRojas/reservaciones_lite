@extends('materialize.template')

@section('page-title', trans('app.dashboard'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
            @lang('app.welcome') <?= Auth::user()->username ?: Auth::user()->first_name ?>!
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li class="active">@lang('app.dashboard')</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

<div class="divider"></div>
<!--card stats start-->
<div id="card-stats">
    <div class="row">
        <div class="col s12 m6 l3">
            <div class="card">
                <div class="card-content  green white-text">
                    <p class="card-stats-title">
                      @lang('app.new_users_this_month')
                    </p>
                    <h3 class="card-stats-number">{{ $stats['new'] }}
                      <i class="mdi-social-group-add medium"></i>
                    </h3>
                </div>
                <a href="{{ route('user.list') }}" class="white-text">
                  <div class="card-action  green darken-2">
                      <div id="clients-bar" class="center-align">
                        <span class="pull-left">@lang('app.view_all_users')</span>
                        <span class="pull-right"><i class="mdi-navigation-arrow-forward small"></i></span>
                        <div class="clearfix"></div>
                      </div>
                  </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- card stats send -->
<div class="row">
{{--    <div class="col s12 m3 l6">
        <div class="card-panel">
            <h4 class="header2">
                <div class="row">
                    <div class="col s7">
                        <div class="title">@lang('app.new_users_this_month')</div>
                        <div class="text-huge">{{ $stats['new'] }}</div>
                    </div>
                    <div class="icon">
                        <i class="mdi-action-perm-identity"></i>
                    </div>
                </div>
            </h4>
            <a href="{{ route('user.list') }}">
                <div class="panel-footer">
                    <span class="pull-left">@lang('app.view_all_users')</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>--}}

{{--    <div class="col-lg-3 col-md-6">
        <div class="panel panel-widget panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-7">
                        <div class="title">@lang('app.total_users')</div>
                        <div class="text-huge">{{ $stats['total'] }}</div>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users fa-5x"></i>
                    </div>
                </div>
            </div>
            <a href="{{ route('user.list') }}">
                <div class="panel-footer">
                    <span class="pull-left">@lang('app.view_details')</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>--}}

{{--    <div class="col-lg-3 col-md-6">
        <div class="panel panel-widget panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-7">
                        <div class="title">@lang('app.banned_users')</div>
                        <div class="text-huge">{{ $stats['banned'] }}</div>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user-times fa-5x"></i>
                    </div>
                </div>
            </div>--}}

{{--            <a href="{{ route('user.list', ['status' => \Vanguard\Support\Enum\UserStatus::BANNED]) }}">
                <div class="panel-footer">
                    <span class="pull-left">@lang('app.view_details')</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>--}}

{{--  <div class="col-lg-3 col-md-6">
        <div class="panel panel-widget panel-purple">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-7">
                        <div class="title">@lang('app.unconfirmed_users')</div>
                        <div class="text-huge">{{ $stats['unconfirmed'] }}</div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="icon">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                </div>
            </div>
            <a href="{{ route('user.list', ['status' => \Vanguard\Support\Enum\UserStatus::UNCONFIRMED]) }}">
                <div class="panel-footer">
                    <span class="pull-left">@lang('app.view_details')</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

</div>--}}

{{--<div class="row">
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('app.registration_history')</div>
            <div class="panel-body">
                <div>
                    <canvas id="myChart" height="403"></canvas>
                </div>
            </div>
        </div>
    </div>--}}
  {{--
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">@lang('app.latest_registrations')</div>
            <div class="panel-body">
                @if (count($latestRegistrations))
                    <div class="list-group">
                        @foreach ($latestRegistrations as $user)
                            <a href="{{ route('user.show', $user->id) }}" class="list-group-item">
                                <img class="img-circle" src="{{ $user->present()->avatar }}">
                                &nbsp; <strong>{{ $user->present()->nameOrEmail }}</strong>
                                <span class="list-time text-muted small">
                                    <em>{{ $user->created_at->diffForHumans() }}</em>
                                </span>
                            </a>
                        @endforeach
                    </div>
                    <a href="{{ route('user.list') }}" class="btn btn-default btn-block">@lang('app.view_all_users')</a>
                @else
                    <p class="text-muted">@lang('app.no_records_found')</p>
                @endif
            </div>
        </div>
    </div>--}}
</div>

@stop

@section('scripts')
    <script>
        var users = {!! json_encode(array_values($usersPerMonth)) !!};
        var months = {!! json_encode(array_keys($usersPerMonth)) !!};
        var trans = {
            chartLabel: "{{ trans('app.registration_history')  }}",
            new: "{{ trans('app.new_sm') }}",
            user: "{{ trans('app.user_sm') }}",
            users: "{{ trans('app.users_sm') }}"
        };
    </script>
    {!! HTML::script('assets/js/chart.min.js') !!}
    {!! HTML::script('assets/js/as/dashboard-admin.js') !!}
@stop
