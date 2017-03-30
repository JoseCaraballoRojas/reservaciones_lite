@extends('layouts.app')

@section('page-title', trans('app.company'))

@section('content')

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            Crear Nueva Empresa
            <small>Detalles de la Empresa</small>
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                    <li><a href="{{ route('empresas.index') }}"> Empresas </a></li>
                    <li class="active">@lang('app.create')</li>
                </ol>
            </div>
        </h1>
    </div>
</div>

@include('partials.messages')
{!! Form::open(['route' => 'empresas.store', 'method' => 'POST' ])  !!}
@include('empresas.partials.detailsEmpresa')
@include('empresas.partials.detailsContactos')

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save"></i>
                Crear Empresa
            </button>
      </div>
    </div>
</div>
{!! Form::close() !!}
@stop
