@extends('materialize.template')

@section('page-title', trans('app.reasons'))

@section('content')

  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          @lang('app.reasons')
          <small>@lang('app.reasons_list')</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
            <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
            <li class="active">@lang('app.reasons')s</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>

<div class="divider"></div>
<br>
@include('partials.messages')

<div class="row">
    <div class="col s12 m12 l12">
        <a href="{{ route('reasons.create') }}" class="btn waves-effect waves-light green  " >
            <i class="mdi-content-add"></i>
            @lang('app.add_reason')
        </a>
    </div>
</div>
<br>
<div class="responsive-table" id="users-table-wrapper">
    <table class="responsive-table striped bordered">
        <thead>
            <th>@lang('app.reason')</th>
            <th>@lang('app.duration')</th>
            <th>@lang('app.registration_date')</th>
            <th class="text-center">@lang('app.action')</th>
        </thead>
        @if (count($reasons))
            @foreach ($reasons as $reason)
                <tr>
                    <td>{{ $reason->reason }}</td>
                    <td>{{ $reason->duration }}</td>
                    <td>{{ $reason->created_at->format('Y-m-d') }}</td>
                    <td class="text-center">

                        <a href="{{ route('reasons.edit', $reason->id) }}"
                          class="btn-floating  waves-effect waves-light light-blue darken-4" title="Editar Razon"
                                data-toggle="tooltip" data-placement="top">
                            <i class="mdi-content-create"></i>
                        </a>
                        <a href="{{ route('reasons.destroy', $reason->id) }}"
                          class="btn-floating  waves-effect waves-light red darken-2" title="Eliminar Razon"
                                data-toggle="tooltip"
                                data-placement="top"
                                data-method="DELETE"
                                data-confirm-title="Confirme por favor!"
                                data-confirm-text="Seguro que desea eliminar esta razon"
                                data-confirm-delete="Si, la elimine">
                            <i class="mdi-action-delete"></i>
                        </a>
                    </td>
                </tr>
              @endforeach
          @else
              <tr>
                  <td colspan="6"><em>@lang('app.no_records_found')</em></td>
              </tr>
          @endif
        <tbody>
        </tbody>
    </table>
    <div class="text-center">
        {!! $reasons->render() !!}
    </div>

</div>
@stop
