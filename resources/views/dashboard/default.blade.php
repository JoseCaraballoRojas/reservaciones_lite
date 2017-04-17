@extends('materialize.template')

@section('page-title', trans('app.dashboard'))

@section('content')

<div class="row">
      <div class="col s12 m12 l12">
        <h1 class="page-header">
            @lang('app.welcome') <?= Auth::user()->username ?: Auth::user()->first_name ?>!
            <div class="pull-right">
                <ol class="breadcrumb">
                    <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
                    <li class="active">@lang('app.dashboard')</li>
                </ol>
            </div>
        </h1>
    </div>
</div>
<div class="divider"></div>

@stop

@section('scripts')
    <script>
        var labels = {!! json_encode(array_keys($activities)) !!};
        var activities = {!! json_encode(array_values($activities)) !!};
    </script>
    {!! HTML::script('assets/js/chart.min.js') !!}
    {!! HTML::script('assets/js/as/dashboard-default.js') !!}
@stop
