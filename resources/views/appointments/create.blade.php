@extends('materialize.template')

@section('page-title', 'Citas')

@section('styles')

@stop

@section('content')

  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">Citas
          <small>Crear cita</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
            <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
            <li class="active">@lang('app.create')</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

<div class="divider"></div>

@include('partials.messages')

@stop

@section('scripts')


@stop
