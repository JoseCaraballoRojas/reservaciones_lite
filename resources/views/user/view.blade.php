@extends('materialize.template')

@section('page-title', $user->present()->nameOrEmail)

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          {{ $user->present()->nameOrEmail }}
          <small>@lang('app.user_details')</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li><a href="{{ route('user.list') }}">@lang('app.users')</a></li>
          <li class="active">{{ $user->present()->nameOrEmail }}</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>


<div class="row">
    <div class="col s12 m4 l5">
        <div id="edit-user-panel" class="card-panel">
            <h4 class="header2">
                @lang('app.details')
                <div class="pull-right">
                    <a href="{{ route('user.edit', $user->id) }}" class="edit"
                       data-toggle="tooltip" data-placement="top" title="@lang('app.edit_user')">
                        @lang('app.edit')
                    </a>
                </div>
            </h4>
            <div class="card-panel">
                <figure class="card-profile-image">
                    <img alt="image" class="circle z-depth-2 responsive-img activator"
                         src="{{ $user->present()->avatar }}">
                </figure>
                <div class="name"><strong>{{ $user->present()->name }}</strong></div>

                @if ($socialNetworks)
                    <div class="icons">
                        @if ($socialNetworks->facebook)
                            <a href="{{ $socialNetworks->facebook }}" class="btn btn-floating btn-facebook">
                                <i class="fa fa-facebook"></i>
                            </a>
                        @endif

                        @if ($socialNetworks->twitter)
                            <a href="{{ $socialNetworks->twitter }}" class="btn btn-floating btn-twitter">
                                <i class="fa fa-twitter"></i>
                            </a>
                        @endif

                        @if ($socialNetworks->google_plus)
                            <a href="{{ $socialNetworks->google_plus }}" class="btn btn-floating btn-google">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        @endif

                        @if ($socialNetworks->linked_in)
                            <a href="{{ $socialNetworks->linked_in }}" class="btn btn-floating btn-linkedin">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        @endif

                        @if ($socialNetworks->skype)
                            <a href="{{ $socialNetworks->skype }}" class="btn btn-floating btn-skype">
                                <i class="fa fa-skype"></i>
                            </a>
                        @endif

                        @if ($socialNetworks->dribbble)
                            <a href="{{ $socialNetworks->dribbble }}" class="btn btn-floating btn-dribbble">
                                <i class="fa fa-dribbble"></i>
                            </a>
                        @endif
                    </div>
                @endif

                <br>

                <table class="responsive-table striped bordered table-details">
                    <thead>
                        <tr>
                            <th colspan="3">@lang('app.contact_informations')</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>@lang('app.email')</td>
                            <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                        </tr>
                        @if ($user->phone)
                            <tr>
                                <td>@lang('app.phone')</td>
                                <td><a href="telto:{{ $user->phone }}">{{ $user->phone }}</a></td>
                            </tr>
                        @endif

                        @if ($socialNetworks && $socialNetworks->skype)
                            <tr>
                                <td>Skype</td>
                                <td>{{ $socialNetworks->skype }}</td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <table class="responsive-table striped bordered">
                    <thead>
                    <tr>
                        <th colspan="3">@lang('app.additional_informations')</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>@lang('app.birth')</td>
                        <td>{{ $user->present()->birthday }}</td>
                    </tr>
                    <tr>
                        <td>@lang('app.address')</td>
                        <td>{{ $user->present()->fullAddress }}</td>
                    </tr>
                    <tr>
                        <td>@lang('app.last_logged_in')'</td>
                        <td>{{ $user->present()->lastLogin }}</td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <div class="col s12 m8 l7">
        <div class="card-panel">
            <h4 class="header2">
                @lang('app.latest_activity')
                <div class="pull-right">
                    <a href="{{ route('activity.user', $user->id) }}" class="edit"
                       data-toggle="tooltip" data-placement="top" title="@lang('app.complete_activity_log')">
                        @lang('app.view_all')
                    </a>
                </div>
            </h4>
            <div class="card-content">
                <table class="responsive-table striped bordered user-activity">
                    <thead>
                        <tr>
                            <th>@lang('app.action')</th>
                            <th>@lang('app.date')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($userActivities as $activity)
                            <tr>
                                <td>{{ $activity->description }}</td>
                                <td>{{ $activity->created_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@stop
