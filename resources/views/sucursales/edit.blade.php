@extends('layouts.app')

@section('page-title', trans('app.subsidiaries'))

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Editar Sucursal
            <small>Detalles de la Sucursal</small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                    <li><a href="{{ route('sucursales.index') }}"> @lang('app.subsidiaries') </a></li>
                    <li class="active">@lang('app.edit')</li>
                </ol>
            </div>
        </h1>
    </div>
</div>

@include('partials.messages')
{!! Form::open(['route' => ['sucursales.update', $sucursal], 'method' => 'PUT' ])  !!}
@include('sucursales.partials.detailsSucursal')
@include('sucursales.partials.detailsContactos')

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-refresh"></i>
                Actualizar Sucursal
            </button>
      </div>
    </div>
</div>
{!! Form::close() !!}
@stop
