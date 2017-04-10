@extends('materialize.template')

@section('page-title', trans('app.roles'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          {{ $edit ? $role->name : trans('app.create_new_role') }}
          <small>{{ $edit ? trans('app.edit_role_details') : trans('app.role_details') }}</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li><a href="{{ route('role.index') }}">@lang('app.roles')</a></li>
          <li class="active">{{ $edit ? trans('app.edit') : trans('app.create') }}</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

@include('partials.messages')

@if ($edit)
    {!! Form::open(['route' => ['role.update', $role->id], 'method' => 'PUT', 'id' => 'role-form']) !!}
@else
    {!! Form::open(['route' => 'role.store', 'id' => 'role-form']) !!}
@endif

<div class="row">
    <div class="col s12 m12 l6">
        <div class="card-panel">
            <h4 class="header2">@lang('app.role_details_big')</h4>
            <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="finput-field col s12">
                      <label for="name">@lang('app.name')</label>
                      <input type="text" class="form-control" id="name"
                             name="name" placeholder="@lang('app.role_name')"
                             value="{{ $edit ? $role->name : old('name') }}">
                    </div>
                  </div>
                </div>
                <div class="col s12">
                  <div class="row">
                    <div class="finput-field col s12">
                      <label for="display_name">@lang('app.display_name')</label>
                      <input type="text" class="form-control" id="display_name"
                             name="display_name" placeholder="@lang('app.display_name')"
                             value="{{ $edit ? $role->display_name : old('display_name') }}">
                    </div>
                </div>
                </div>
                <div class="col s12">
                  <div class="row">
                    <div class="finput-field col s12">
                      <label for="description">@lang('app.description')</label>
                      <textarea name="description" id="description" class="form-control">
                        {{ $edit ? $role->description : old('description') }}
                      </textarea>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>

<div class="row">
    <div class="col-md-2">
        <button type="submit" class="btn cyan waves-effect waves-light">
            <i class="mdi-content-save"></i>
            {{ $edit ? trans('app.update_role') : trans('app.create_role') }}
        </button>
    </div>
</div>

@stop

@section('scripts')
    @if ($edit)
        {!! JsValidator::formRequest('Vanguard\Http\Requests\Role\UpdateRoleRequest', '#role-form') !!}
    @else
        {!! JsValidator::formRequest('Vanguard\Http\Requests\Role\CreateRoleRequest', '#role-form') !!}
    @endif
@stop
