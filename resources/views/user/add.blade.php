@extends('materialize.template')

@section('page-title', trans('app.add_user'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          @lang('app.create_new_user')
          <small>@lang('app.user_details')</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li><a href="{{ route('user.list') }}">@lang('app.users')</a></li>
          <li class="active">@lang('app.create')</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

@include('partials.messages')

{!! Form::open(['route' => 'user.store', 'files' => true, 'id' => 'user-form']) !!}
    <div class="row">
        <div class="col s8">
            @include('user.partials.details', ['edit' => false, 'profile' => false])
        </div>
        <div class="col s4">
            @include('user.partials.auth', ['edit' => false])
        </div>
    </div>

    <div class="col s12 ">
        <div class="input-field col s4">
          <div class="input-field col s12">
            <button type="submit" class="btn cyan waves-effect waves-light">
                <i class="mdi-content-save"></i>
                  @lang('app.create_user')
            </button>
          </div>
      </div>
    </div>

{!! Form::close() !!}

@stop

@section('styles')
    {!! HTML::style('assets/css/bootstrap-datetimepicker.min.css') !!}
@stop

@section('scripts')
    {!! HTML::script('assets/js/moment.min.js') !!}
    {!! HTML::script('assets/js/bootstrap-datetimepicker.min.js') !!}
    {!! HTML::script('assets/js/as/profile.js') !!}
    {!! JsValidator::formRequest('Vanguard\Http\Requests\User\CreateUserRequest', '#user-form') !!}
@stop
