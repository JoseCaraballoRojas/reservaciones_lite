@extends('materialize.template')

@section('page-title', trans('app.reasons'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          @lang('app.create_new_reason')
          <small>@lang('app.details_reasons_appointment')</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
            <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
            <li><a href="{{ route('empresas.index') }}"> @lang('app.reasons') </a></li>
            <li class="active">@lang('app.create')</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

<div class="divider"></div>

@include('partials.messages')
{!! Form::open(['route' => 'reasons.store', 'method' => 'POST' ])  !!}
  @include('reasons.partials.detailsReason')

{!! Form::close() !!}
@stop

@section('scripts')

<!-- ============= Scripts ==================== -->
<!-- cargar timepicker-->
    {!! HTML::script('assets/template/js/materialize-plugins/date_picker/picker.time.js') !!}
    {!! HTML::script('assets/js/reservaciones/agendas/input_time.js') !!}

@stop
