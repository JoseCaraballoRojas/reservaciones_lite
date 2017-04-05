@extends('layouts.app')

@section('page-title', 'Editar area')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Editar Area
            <small>Detalles del Area</small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                    <li><a href="{{ route('areas.index') }}"> Areas </a></li>
                    <li class="active">@lang('app.edit')</li>
                </ol>
            </div>
        </h1>
    </div>
</div>

@include('partials.messages')
{!! Form::open(['route' => ['areas.update', $area], 'method' => 'PUT' ])  !!}
@include('areas.partials.detailsArea')
@include('areas.partials.detailsContactos')

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-refresh"></i>
                Actualizar Area
            </button>
      </div>
    </div>
</div>
{!! Form::close() !!}
@stop
