@extends('materialize.template')

@section('page-title', trans('app.reasons'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          @lang('app.edit_reason')
          <small>@lang('app.details_reasons_appointment')</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
            <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
            <li><a href="{{ route('reasons.index') }}"> @lang('app.reasons') </a></li>
            <li class="active">@lang('app.edit')</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

<div class="divider"></div>

@include('partials.messages')
{!! Form::open(['route' => ['reasons.update', $reason], 'method' => 'PUT' ])  !!}

  @include('reasons.partials.detailsReason')

{!! Form::close() !!}
@stop
