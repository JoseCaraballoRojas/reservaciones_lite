@extends('materialize.template')

@section('page-title', trans('app.permissions'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          @lang('app.permissions')
          <small>@lang('app.available_system_permissions')</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li class="active">@lang('app.permissions')</li>
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
        <a href="{{ route('permission.create') }}" class="waves-effect waves-light green btn" id="add-user">
            <i class=" large mdi-content-add"></i>
              @lang('app.add_permission')
        </a>
    </div>
</div>
<br>

{!! Form::open(['route' => 'permission.save']) !!}

<div class="responsive-table" id="users-table-wrapper">
    <table class="responsive-table striped bordered">
        <thead>
            <th>@lang('app.name')</th>
            @foreach ($roles as $role)
                <th class="text-center">{{ $role->display_name }}</th>
            @endforeach
            <th class="text-center">@lang('app.action')</th>
            </thead>
        <tbody>
        @if (count($permissions))
            @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->display_name ?: $permission->name }}</td>

                    @foreach ($roles as $role)
                      <td class="text-center">
                          <div class="checkbox">
                              {!! Form::checkbox("roles[{$role->id}][]", $permission->id,
                                  $role->hasPermission($permission->name), ['class' => ' filled-in checkbox', 'id' => "roles[$role->id][$permission->id]"]) !!}
                                <label for="roles[{{$role->id}}][{{$permission->id}}]" class="no-content"></label>
                            </div>
                        </td>
                    @endforeach

                    <td class="text-center">
                        <a href="{{ route('permission.edit', $permission->id) }}"
                          class="btn-floating  waves-effect waves-light blue"
                           title="@lang('app.edit_permission')" data-toggle="tooltip" data-placement="top">
                            <i class="mdi-content-create"></i>
                        </a>
                        @if ($permission->removable)
                            <a href="{{ route('permission.destroy', $permission->id) }}"
                              class="btn-floating  waves-effect waves-light red darken-2"
                               title="@lang('app.delete_permission')"
                               data-toggle="tooltip"
                               data-placement="top"
                               data-method="DELETE"
                               data-confirm-title="@lang('app.please_confirm')"
                               data-confirm-text="@lang('app.are_you_sure_delete_permission')"
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

@if (count($permissions))
    <br>
    <div class="row">
        <div class="col s12 m12 l12">
            <button type="submit" class="waves-effect waves-light green btn">@lang('app.save_permissions')</button>
        </div>
    </div>
@endif

{!! Form::close() !!}

@stop
