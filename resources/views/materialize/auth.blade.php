<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('page-title') | {{ settings('app_name') }}</title>
{{--
    {!! HTML::style("assets/css/bootstrap.min.css") !!}
    {!! HTML::style("assets/css/font-awesome.min.css") !!}
    {!! HTML::style("assets/css/app.css") !!}
    {!! HTML::style("assets/css/bootstrap-social.css") !!}
--}}
    <!-- CORE CSS-->
    {!! HTML::style('assets/template/css/materialize.css') !!}
    {!! HTML::style('assets/template/css/style.css') !!}
    <!-- Custome CSS-->
    {!! HTML::style('assets/template/css/custom/custom.css') !!}


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
      {!! HTML::style('assets/template/js/plugins/prism/prism.css') !!}
      {!! HTML::style('assets/template/js/plugins/perfect-scrollbar/perfect-scrollbar.css') !!}
      {!! HTML::style('assets/template/js/plugins/chartist-js/chartist.min.css') !!}

    <!-- FONT-AWESOME -->
      {!! HTML::style('assets/css/font-awesome.min.css') !!}


    @yield('header-scripts')
</head>
<body class="auth cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

    <div class="container">

        @yield('content')

      {{--  <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col s12 ">
                        <p>@lang('app.copyright') © - {{ settings('app_name') }} {{ date('Y') }}</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
--}}
{{--
    {!! HTML::script('assets/js/jquery-2.1.4.min.js') !!}
    {!! HTML::script('assets/js/bootstrap.min.js') !!}
    {!! HTML::script('vendor/jsvalidation/js/jsvalidation.js') !!}
    {!! HTML::script('assets/js/as/app.js') !!}
    {!! HTML::script('assets/js/as/btn.js') !!}
--}}

    <!-- jQuery Library -->
    {!! HTML::script('assets/template/js/plugins/jquery-1.11.2.min.js') !!}
    <!--angularjs-->
    {!! HTML::script('assets/template/js/plugins/angular.min.js') !!}
    <!--materialize js-->
    {!! HTML::script('assets/template/js/materialize.js') !!}
    <!--prism js-->
    {!! HTML::script('assets/template/js/plugins/prism/prism.js') !!}
    <!--scrollbar-->
    {!! HTML::script('assets/template/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') !!}
    <!-- chartist -->
    {!! HTML::script('assets/template/js/plugins/chartist-js/chartist.min.js') !!}
    <!-- dropify -->
    {!! HTML::script('assets/template/js/plugins/dropify/js/dropify.min.js') !!}
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    {!! HTML::script('assets/template/js/plugins.js') !!}
    <!--custom-script.js - Add your own theme custom JS-->
    {!! HTML::script('assets/template/js/custom-script.js') !!}

    @yield('scripts')
</body>
</html>
