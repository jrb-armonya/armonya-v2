<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Armonya Espace Partenaire">
    <meta name="author" content="Armonya">

    <!--favicon icon-->
    <link rel="shortcut icon" href="/armonya-v2.local/favicon.ico">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>Armonya | Espace Partenaire</title>
    {{-- TODO: Will be deleted on OVH --}}
    <script src="{{asset('common/scripts.js')}}"></script>

    <!--web fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">

    <!--bootstrap styles-->
    <link href="{{ asset('/backend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--icon font-->
    {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v4/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous"> --}}
    <link href="{{ asset('/backend/assets/vendor/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">

    <!--icon font-->
    <link href="{{ asset('/backend/assets/vendor/dashlab-icon/dashlab-icon.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/assets/vendor/themify-icons/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('/backend/assets/vendor/weather-icons/css/weather-icons.min.css') }}" rel="stylesheet">
    <!--jquery ui-->
    <link href="{{ asset('/backend/assets/vendor/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
    <!--iCheck-->
    <link href="{{ asset('/backend/assets/vendor/icheck/skins/all.css') }}" rel="stylesheet">
    <!--vector maps -->
    <link href="{{ asset('/backend/assets/vendor/vector-map/jquery-jvectormap-1.1.1.css') }}" rel="stylesheet">
    <!-- toastr  -->
    <link href="{{ asset('/backend/assets/vendor/toastr-master/toastr.css') }}" rel="stylesheet">
    <!--c3chart-->
    <link href="{{ asset('/backend/assets/vendor/c3chart/c3.min.css') }}" rel="stylesheet">
    @yield('css')
    <!--custom styles-->
    <link href="{{ asset('/backend/assets/css/main.css') }}" rel="stylesheet">

    <style>
        
    </style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
        <script src="backend/assets/vendor/html5shiv.js"></script>
        <script src="backend/assets/vendor/respond.min.js"></script>
    <![endif]-->
</head>

<body class="left-sidebar-fixed left-sidebar-dark header-fixed header-primary-color " id="app">
    @include('espace-partenaire::header.header')
    {{-- @include('app.dashboard.parts.search') --}}
    
     
    <!--header start-->
    <div class="app-body">
        @include('espace-partenaire::sidebar.menu')
        <!--main content wrapper-->
        <div class="content-wrapper">
            
            <div class="container-fluid">
                @include('app.dashboard.components.page-title')

                @yield('content')

            </div>
            @include('app.dashboard.parts.footer')
        </div>
        <!--/main content wrapper-->

        
    </div>

<!--basic scripts-->

<script type="text/javascript" src="{{ asset('backend/assets/vendor/popper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/assets/vendor/jquery/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('backend/assets/vendor/jquery-ui/jquery-ui.min.js') }}"></script>

<script type="text/javascript" src="{{ asset('backend/assets/vendor/jquery.dcjqaccordion.2.7.js') }}"></script>
<script type="text/javascript" src="{{ asset('backend/assets/vendor/icheck/skins/icheck.min.js') }}"></script>
<!--sparkline-->
<script type="text/javascript" src="{{ asset('backend/assets/vendor/sparkline/jquery.sparkline.js') }}"></script>
<!--sparkline initialization-->
<script type="text/javascript" src="{{ asset('backend/assets/vendor/js-init/sparkline/init-sparkline.js') }}"></script>

<!--toastr-->
<script type="text/javascript" src="{{ asset('backend/assets/vendor/toastr-master/toastr.js') }}"></script>

@yield('javascript')

<script type="text/javascript" src="{{ asset('backend/assets/js/scripts.js') }}"></script>
{{-- <script type="text/javascript" src="{{ asset('/backend/assets/js/search.js') }}"></script> --}}
<script>
  // disable Enter event on all forms expect the textareas
  $(document).ready(function() {
    $(window).keydown(function(event){
      if( event.keyCode == 13 && ( $(event.target).attr('id') != 'internal_comment')  ) {
        if($(event.target).attr('id') != 'commentaire'){
          event.preventDefault();
          return false;
        }
      }
    });
  });

  // disable autocomplete for all forms 
  $('.fiche-input').attr('autocomplete', 'off');

</script>
@if(Session::get('message'))
<script>
    var shortCutFunction = "";
    var msg = "{{Session::get('message')}}"
    var title = "{{Session::get('title')}}"
    var type = "{{Session::get('type')}}"
    var $showDuration = 300;
    var $hideDuration = 300;
    var $timeOut = 5000;
    var $extendedTimeOut = 1000;
    var $showEasing = "swing";
    var $hideEasing = "linear";
    var $showMethod = "fadeIn";
    var $hideMethod = "fadeOut";

    toastr.options = {
        closeButton: true,
        debug: false,
        progressBar: true,
        positionClass: "toast-top-right",
        preventDuplicates: false,
        onclick: null
    };

    var $toast = toastr[type](msg, title); // Wire up an event handler to a button in the toast, if it exists
    $toastlast = $toast;
</script>
@endif
<div class="loader"></div>
</body>
</html>