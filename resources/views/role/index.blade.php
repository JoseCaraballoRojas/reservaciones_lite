@extends('materialize.template')

@section('page-title', trans('app.roles'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          @lang('app.roles')
          <small>@lang('app.available_system_roles')</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li class="active">@lang('app.roles')</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

<div class="divider"></div>
<br>

    @include('partials.messages')
    <div class="row">
        <div class="col s12 m12 l12">
            <a href="{{ route('role.create') }}" class="btn waves-effect waves-light green" >
                <i class="mdi-content-add"></i>
                  @lang('app.add_role')
            </a>
        </div>
    </div>
    <br>


    <div class="responsive-table" id="users-table-wrapper">
        <table class="responsive-table striped bordered">
            <thead>
                <th>@lang('app.name')</th>
                <th>@lang('app.display_name')</th>
                <th>@lang('app.users_with_this_role')</th>
                <th class="text-center">@lang('app.action')</th>
                </thead>
            <tbody>
            @if (count($roles))
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->display_name }}</td>
                        <td>{{ $role->users_count }}</td>
                        <td class="text-center">
                            <a href="{{ route('role.edit', $role->id) }}"
                              class="btn-floating  waves-effect waves-light blue"
                               title="@lang('app.edit_role')" data-toggle="tooltip" data-placement="top">
                                <i class="mdi-content-create"></i>
                            </a>
                            @if ($role->removable)
                                <a href="{{ route('role.delete', $role->id) }}"
                                  class="btn-floating  waves-effect waves-light red darken-2"
                                   title="@lang('app.delete_role')"
                                   data-toggle="tooltip"
                                   data-placement="top"
                                   data-method="DELETE"
                                   data-confirm-title="@lang('app.please_confirm')"
                                   data-confirm-text="@lang('app.are_you_sure_delete_role')"
                                   data-confirm-delete="@lang('app.yes_delete_it')">
                                    <i class="mdi-action-delete"></i>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="4"><em>@lang('app.no_records_found')</em></td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>

@stop
