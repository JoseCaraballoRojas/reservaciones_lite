@extends('materialize.template')

@section('page-title', trans('app.appointment'))

@section('content')

  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">@lang('app.appointment')
          <small>Lista de registradas registradas</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
            <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>

        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

<div class="divider"></div>
<br>
@include('partials.messages')


@stop
