@extends('materialize.template')

@section('page-title', trans('app.permissions'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          {{ $edit ? $permission->name : trans('app.create_new_permission') }}
          <small>{{ $edit ? trans('app.edit_permission_details') : trans('app.permission_details_sm') }}</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li><a href="{{ route('permission.index') }}">@lang('app.permissions')</a></li>
          <li class="active">{{ $edit ? trans('app.edit') : trans('app.create') }}</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>


@include('partials.messages')

@if ($edit)
    {!! Form::open(['route' => ['permission.update', $permission->id], 'method' => 'PUT', 'id' => 'permission-form']) !!}
@else
    {!! Form::open(['route' => 'permission.store', 'id' => 'permission-form']) !!}
@endif

<div class="row">
    <div class="col s12 m12 l12">
        <div class="card-panel">
              <h4 class="header2">@lang('app.permission_details')</h4>
              <div class="row">
                <div class="col s12">
                  <div class="row">
                    <div class="finput-field col s12">
                      <label for="name">@lang('app.name')</label>
                      <input type="text" class="form-control" id="name"
                             name="name" placeholder="@lang('app.permission_name')"
                             value="{{ $edit ? $permission->name : old('name') }}">
                    </div>
                  </div>
                </div>

                <div class="col s12">
                  <div class="row">
                    <div class="finput-field col s12">
                      <label for="display_name">@lang('app.display_name')</label>
                      <input type="text" class="form-control" id="display_name"
                             name="display_name" placeholder="@lang('app.display_name')"
                             value="{{ $edit ? $permission->display_name : old('display_name') }}">
                    </div>
                  </div>
                </div>

                <div class="col s12">
                  <div class="row">
                    <div class="finput-field col s12">
                      <label for="description">@lang('app.description')</label>
                      <textarea name="description" id="description" class="form-control">
                        {{ $edit ? $permission->description : old('description') }}</textarea>
                    </div>
                  </div>
                </div>

                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col s12">
        <button type="submit" class="btn cyan waves-effect waves-light">
            <i class="mdi-content-save"></i>
            {{ $edit ? trans('app.update_permission') : trans('app.create_permission') }}
        </button>
    </div>
</div>

@stop

@section('scripts')
    @if ($edit)
        {!! JsValidator::formRequest('Vanguard\Http\Requests\Permission\UpdatePermissionRequest', '#permission-form') !!}
    @else
        {!! JsValidator::formRequest('Vanguard\Http\Requests\Permission\CreatePermissionRequest', '#permission-form') !!}
    @endif
@stop
