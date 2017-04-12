@extends('materialize.template')

@section('page-title', trans('app.edit_user'))

@section('content')
  <div class="container">
    <div class="row">
      <div class="col s12 m12 l12">
        <h5 class="breadcrumbs-title">
          {{ $user->present()->nameOrEmail }}
          <small>@lang('app.edit_user_details')</small>
        <div class="pull-right">
        <ol class="breadcrumbs">
          <li><a href="javascript:;">@lang('app.home')</a></li>
          <li><a href="{{ route('user.list') }}">@lang('app.users')</a></li>
          <li><a href="{{ route('user.show', $user->id) }}">{{ $user->present()->nameOrEmail }}</a></li>
          <li class="active">@lang('app.edit')</li>
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
             <li class="tab col s4">
               <a href="#details" class="white-text red darken-1 waves-effect waves-light
                  active"  >
               <i class="mdi-navigation-apps"></i> @lang('app.details')
               </a>
             </li>
             <li class="tab col s4">
               <a href="#social-networks" class="white-text purple darken-1 waves-effect waves-light">
                 <i class="fa fa-youtube"></i> @lang('app.social_networks')
               </a>
             </li>
             <li class="tab col s4">
               <a class="white-text light-blue darken-1 waves-effect waves-light"
                  href="#auth">
                 <i class="mdi-action-lock"></i> @lang('app.authentication')
               </a>
             </li>
           </ul>
         </div>
         <div class="col s12">
           <div class="row">
             <div id="details" class="col s12  gray lighten-3">
               <div class="col s12 m8 l7">
                   {!! Form::open(['route' => ['user.update.details',
                       $user->id], 'method' => 'PUT', 'id' => 'details-form']) !!}
                       @include('user.partials.details', ['profile' => false])
                   {!! Form::close() !!}
               </div>
               {{-- PANEL DEL AVATAR
               <div class="col s12 m4 l5">
                   {!! Form::open(['route' => ['user.update.avatar',
                       $user->id], 'files' => true, 'id' => 'avatar-form']) !!}
                       @include('user.partials.avatar',
                       ['updateUrl' => route('user.update.avatar.external', $user->id)])
                   {!! Form::close() !!}
               </div>
               --}}
             </div>
          </div>
          <div class="row">
             <div id="social-networks"  class="col s12  gray lighten-3">
               <div class="col s12 m8 l12">
                   {!! Form::open(['route' => ['user.update.socials', $user->id]]) !!}
                       @include('user.partials.social-networks')
                   {!! Form::close() !!}
               </div>
             </div>
          </div>
          <div class="row">
             <div id="auth" class="col s12  gray lighten-3">

                 <div class="col s12 m8 l7">
                     {!! Form::open(['route' => ['user.update.login-details',
                       $user->id], 'method' => 'PUT', 'id' => 'login-details-form']) !!}
                         @include('user.partials.auth')
                     {!! Form::close() !!}
                 </div>
                 <div class="col s12 m4 l5">
                     @if (settings('2fa.enabled'))
                         <?php $route = Authy::isEnabled($user) ? 'disable' : 'enable' ?>
                         {!! Form::open(['route' => ["user.two-factor.{$route}",
                             $user->id], 'id' => 'two-factor-form']) !!}
                             @include('user.partials.two-factor')
                         {!! Form::close() !!}
                     @endif
                 </div>

             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
</div>
@stop
{{--fin de tab  --}}


@section('styles')
    {{--{!! HTML::style('assets/css/bootstrap-datetimepicker.min.css') !!}--}}
    {!! HTML::style('assets/plugins/croppie/croppie.css') !!}
@stop

@section('scripts')
    {!! HTML::script('assets/plugins/croppie/croppie.js') !!}
    {!! HTML::script('assets/js/moment.min.js') !!}
    {{--{!! HTML::script('assets/js/bootstrap-datetimepicker.min.js') !!}--}}
    {!! HTML::script('assets/js/as/btn.js') !!}
    {!! HTML::script('assets/js/as/profile.js') !!}
    {!! JsValidator::formRequest('Vanguard\Http\Requests\User\UpdateDetailsRequest', '#details-form') !!}
    {!! JsValidator::formRequest('Vanguard\Http\Requests\User\UpdateLoginDetailsRequest', '#login-details-form') !!}

    @if (settings('2fa.enabled'))
        {!! JsValidator::formRequest('Vanguard\Http\Requests\User\EnableTwoFactorRequest', '#two-factor-form') !!}
    @endif
@stop
