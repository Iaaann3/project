<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
       <title>WangsSmart</title>
      <link href="{{ asset('/images/logo/smar.png') }}" rel="icon">
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
      <link rel="icon" href="{{ asset('/admin/images/fevicon.png') }}" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="{{ asset('/admin/css/bootstrap.min.css') }}" />
      <!-- site css -->
      <link rel="stylesheet" href="{{ asset('/admin/css/style.css') }}" />
      <!-- responsive css -->
      <link rel="stylesheet" href="{{ asset('/admin/css/responsive.css') }}" />
      <!-- color css -->
      <link rel="stylesheet" href="{{ asset('/admin/css/colors.css') }}" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="{{ asset('/admin/css/bootstrap-select.css') }}" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="{{ asset('/admin/css/perfect-scrollbar.css') }}" />
      <!-- custom css -->
      <link rel="stylesheet" href="{{ asset('/admin/css/custom.css') }}" />
      <link rel="stylesheet" href="{{ asset('/admin/css/style.css') }}">

      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="dashboard dashboard_1">
      <div id="wrapper">
         <!-- Navigation -->
         @include('layouts.part.navbar')
         <!-- Sidebar -->
         @include('layouts.part.sidebar')

         <!-- Main Content -->
         <div id="page-wrapper">
            <div class="container-fluid">
               @yield('content')
            </div> <!-- /.container-fluid -->
         </div> <!-- /#page-wrapper -->
      </div> <!-- /#wrapper -->

      <!-- jQuery -->
      <script src="{{ asset('/admin/js/jquery.min.js') }}"></script>
      <script src="{{ asset('/admin/js/popper.min.js') }}"></script>
      <script src="{{ asset('/admin/js/bootstrap.min.js') }}"></script>
      <!-- wow animation -->
      <script src="{{ asset('/admin/js/animate.js') }}"></script>
      <!-- select country -->
      <script src="{{ asset('/admin/js/bootstrap-select.js') }}"></script>
      <!-- owl carousel -->
      <script src="{{ asset('/admin/js/owl.carousel.js') }}"></script> 
      <!-- chart js -->
      <script src="{{ asset('/admin/js/Chart.min.js') }}"></script>
      <script src="{{ asset('/admin/js/Chart.bundle.min.js') }}"></script>
      <script src="{{ asset('/admin/js/utils.js') }}"></script>
      <script src="{{ asset('/admin/js/analyser.js') }}"></script>
      <!-- nice scrollbar -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
      <script src="{{ asset('/admin/js/perfect-scrollbar.min.js') }}"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <!-- custom js -->
      <script src="{{ asset('/admin/js/custom.js') }}"></script>
      <script src="{{ asset('/admin/js/chart_custom_style1.js') }}"></script>
   </body>
</html>