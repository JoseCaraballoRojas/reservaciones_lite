@extends('materialize.template')

@section('page-title', trans('app.authentication_settings'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          @lang('app.authentication')
          <small>@lang('app.system_auth_registration_settings')</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="{{ route('dashboard') }}">@lang('app.home')</a></li>
          <li><a href="javascript:;">@lang('app.settings')</a></li>
          <li class="active">@lang('app.authentication')</li>
        </ol>
        </div>
        </h5>
      </div>
    </div>
  </div>
<div class="divider"></div>

@include('partials.messages')


{{-- Incio de tab --}}
<div id="multi-color-tab" class="section">
   <div class="row">
     <div class="col s12 m8 l12">
       <div class="row">
         <div class="col s12">
           <ul class="tabs">
             <li class="tab col s6">
               <a href="#auth" aria-controls="auth" role="tab" data-toggle="tab"
                  class="white-text cyan darken-1 waves-effect waves-light active"  >
                   <i class="fa fa-lock"></i>
                   @lang('app.authentication')
               </a>
             </li>
             <li class="tab col s6">
               <a href="#registration" aria-controls="registration" role="tab" data-toggle="tab"
                  class="white-text red darken-1 waves-effect waves-light" >
                   <i class="fa fa-user-plus"></i>
                   @lang('app.registration')
               </a>
             </li>
           </ul>
         </div>
         <!--PANES-->
         <div class="col s12">
           <div class="row">
             <div id="auth" class="col s12  gray lighten-3">
               <div class="col s12 m12 l6">
                   @include('settings.partials.auth')
               </div>
               <div class="col s12 m12 l6">
                   @include('settings.partials.throttling')
               </div>
               <div class="row">
                   <div class="col s12 m12 l12">
                       @include('settings.partials.two-factor')
                   </div>
               </div>
             </div>
          </div>
          <div class="row">
             <div id="registration"  class="col s12  gray lighten-3">
               <div class="col s12 m12 l6">
                   @include('settings.partials.registration')
               </div>
               <div class="col s12 m12 l6">
                   @include('settings.partials.recaptcha')
               </div>
             </div>
          </div>
         </div>
       </div>
     </div>
   </div>
</div>

{{--fin de tab  --}}

<!-- Nav tabs -->
{{--
<ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active">

    </li>
    <li role="presentation">

    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="auth">
        <div class="row">
            <div class="col-md-6">

            </div>
            <div class="col-md-6">
                @include('settings.partials.throttling')
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                @include('settings.partials.two-factor')
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="registration">
        <div class="row">
            <div class="col-md-6">
                @include('settings.partials.registration')
            </div>
            <div class="col-md-6">
                @include('settings.partials.recaptcha')
            </div>
        </div>
    </div>
</div>
--}}
@stop

@section('scripts')
    {!! HTML::script('assets/plugins/bootstrap-switch/bootstrap-switch.min.js') !!}
    <script>
        $(".switch").bootstrapSwitch({ size: 'small' });
    </script>
@stop

@section('styles')
    {!! HTML::style('assets/plugins/bootstrap-switch/bootstrap-switch.css') !!}
@stop
