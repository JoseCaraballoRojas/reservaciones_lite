<!DOCTYPE html>
<html lang="en">

<!--================================================================================
	Item Name: Materialize - Material Design Admin Template
	Version: 3.1
	Author: GeeksLabs
	Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Title
  <title>Page Blank | Materialize - Material Design Admin Template</title>-->
  <title>@yield('page-title') | Materialize - Material Design Admin Template</title>


  <!-- Favicons-->
  <link rel="icon" sizes="32x32" href="{{ url('assets/template/images/favicon/favicon-32x32.png') }}" >
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="{{ url('assets/template/images/favicon/apple-touch-icon-152x152.png') }}">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="{{ url('assets/template/images/favicon/mstile-144x144.png') }}">
  <!-- For Windows Phone -->


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

</head>

<body>
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START HEADER -->
  <header id="header" class="page-topbar">
        <!-- start header nav-->
            @include('materialize.partials.header-nav')
        <!-- end header nav-->
  </header>
  <!-- END HEADER -->

  <!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START MAIN -->
  <div id="main">
    <!-- START WRAPPER -->
    <div class="wrapper">

      <!-- START LEFT SIDEBAR NAV-->
          @include('materialize.partials.left-sidebar-nav')
      <!-- END LEFT SIDEBAR NAV-->

      <!-- //////////////////////////////////////////////////////////////////////////// -->

      <!-- START CONTENT -->
      <section id="content">
        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            <div class="header-search-wrapper grey hide-on-large-only">
                <i class="mdi-action-search active"></i>
                <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
            </div>
        </div>
        <!--breadcrumbs end-->

        <!--start container-->
        <div class="container">
          <div class="section">
            @yield('content')
          </div>
          <!-- Floating Action Button -->
             @include('materialize.partials.floating-button')
            <!-- Floating Action Button -->
        </div>
        <!--end container-->
      </section>
      <!-- END CONTENT -->

<!-- //////////////////////////////////////////////////////////////////////////// -->
      <!-- START RIGHT SIDEBAR NAV-->
          @include('materialize.partials.right-sidebar-nav')
      <!-- LEFT RIGHT SIDEBAR NAV-->
    </div>
    <!-- END WRAPPER -->
  </div>
  <!-- END MAIN -->

<!-- //////////////////////////////////////////////////////////////////////////// -->

  <!-- START FOOTER -->
        @include('materialize.partials.footer')
  <!-- END FOOTER -->

    <!-- ================================================
    Scripts
    ================================================ -->

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
    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });
    </script>
</body>

</html>
