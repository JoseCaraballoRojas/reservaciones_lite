@extends('materialize.template')

@section('page-title', trans('app.users'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          @lang('app.users')
          <small>@lang('app.list_of_registered_users')</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li class="active">@lang('app.users')</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>


@include('partials.messages')
  <div class="row">
      <div class="col s12 m12 l12">
          <a  href="{{ route('user.create') }}" class="waves-effect waves-light green btn" id="add-user">
              <i class=" large mdi-content-add"></i>
              @lang('app.add_user')
          </a>
      </div>
  </div>
<br>  
{{--
<div id="search-bar" class="section">
  <div class="row">
    <div class="col s12 m8 l12">
      <nav class="grey lighten-4 ">
        <div class="nav-wrapper">
          <div class="col s12 ">
            <form class="row" method="GET" action="" accept-charset="UTF-8" id="users-form">
              <a href="#" class="button-collapse">
                <i class="mdi-navigation-menu"></i>
              </a>
              <ul class="hide-on-med-and-down">
                <li>
                    {!! Form::select('status', $statuses, Input::get('status'), ['id' => 'status']) !!}
                </li>
                <li>
                  <div class="input-field black-text ">
                    <input id="search" type="text" required="" name="search"
                      value="{{ Input::get('search') }}" placeholder="@lang('app.search_for_action')">
                  </div>
                </li>
                <li>
                  @if (Input::has('search') && Input::get('search') != '')
                  <div class="">
                    <a href="{{ route('user.list') }}" class="red" type="button">
                        <span class="mdi-content-clear"></span>
                    </a>
                  </div>
                  @endif
                </li>
                <li>
                  <div class="grey lighten-1">
                    <a href="#" type="submit" id="search-activities-btn">
                        <i class="mdi-action-search"></i>
                    </a>
                  </div>
                </li>
              </ul>
            </form>
          </div>
        </div>
      </nav>
    </div>
  </div>
</div>



<div class="row ">
  <div class="col s12 m12 l12">

    <form method="GET" action="" accept-charset="UTF-8" id="users-form">
        <div class="col l6">
            {!! Form::select('status', $statuses, Input::get('status'), ['id' => 'status']) !!}
        </div>
        <div class="col l6">
            <div class="input-field col l6">
              <i class="mdi-action-search prefix"></i>
                <input type="text" class="validate" name="search" id="icon_prefix"
                value="{{ Input::get('search') }}" >
               <button class="btn " type="submit" id="search-users-btn">
                  <i class="mdi-action-search prefix"></i>
                  Buscar
                </button>
                <label for="icon_prefix">@lang('app.search_for_users')</label>


                    @if (Input::has('search') && Input::get('search') != '')
                        <a href="{{ route('user.list') }}" class="red" type="button" >
                            <span class=""mdi-content-clear"></span>
                        </a>
                    @endif
                </span>
            </div>
        </div>
    </form>
</div>
</div>
--}}
<div class="table-responsive top-border-table" id="users-table-wrapper">
    <table class="table">
        <thead>
            <th>@lang('app.username')</th>
            <th>@lang('app.full_name')</th>
            <th>@lang('app.email')</th>
            <th>@lang('app.registration_date')</th>
            <th>@lang('app.status')</th>
            <th class="text-center">@lang('app.action')</th>
        </thead>
        <tbody>
            @if (count($users))
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->username ?: trans('app.n_a') }}</td>
                        <td>{{ $user->first_name . ' ' . $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('Y-m-d') }}</td>
                        <td>
                            <span class="label label-{{ $user->present()->labelClass }}">{{ trans("app.{$user->status}") }}</span>
                        </td>
                        <td class="text-center">
                            @if (config('session.driver') == 'database')
                                <a href="{{ route('user.sessions', $user->id) }}"
                                   class="btn-floating  waves-effect waves-light blue"
                                   title="@lang('app.user_sessions')" data-toggle="tooltip" data-placement="top">
                                    <i class="mdi-action-view-list"></i>
                                </a>
                            @endif
                            <a href="{{ route('user.show', $user->id) }}"
                              class="btn-floating  waves-effect waves-light green"
                               title="@lang('app.view_user')" data-toggle="tooltip" data-placement="top">
                                <i class="mdi-action-visibility"></i>
                            </a>
                            <a href="{{ route('user.edit', $user->id) }}"
                              class="btn-floating  waves-effect waves-light light-blue darken-4" title="@lang('app.edit_user')"
                                    data-toggle="tooltip" data-placement="top">
                                <i class="mdi-content-create"></i>
                            </a>
                            <a href="{{ route('user.delete', $user->id) }}"
                              class="btn-floating  waves-effect waves-light red darken-2" title="@lang('app.delete_user')"
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    data-method="DELETE"
                                    data-confirm-title="@lang('app.please_confirm')'"
                                    data-confirm-text="@lang('app.are_you_sure_delete_user')"
                                    data-confirm-delete="@lang('app.yes_delete_him')'">
                                <i class="mdi-action-delete"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6"><em>@lang('app.no_records_found')</em></td>
                </tr>
            @endif
        </tbody>
    </table>

    {!! $users->render() !!}
</div>

@stop

@section('scripts')
    <script>
        $("#status").change(function () {
            $("#users-form").submit();
        });
    </script>
@stop
