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
      <title>Pluto - Responsive Bootstrap Admin Panel Templates</title>
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
         <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            @include('layouts.part.navbar')
         </nav>

         <!-- Sidebar -->
         @include('layouts.part.sidebar')

         <div id="page-wrapper">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     <h1 class="page-header">Dana</h1>
                  </div>
               </div>
               <div class="row">
                  <div class="panel-body">
                     <div class="card-body">
                        @if (session('success'))
                           <div class="alert alert-success alert-dismissible fade show" role="alert">
                              {{ session('success') }}
                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                           </div>
                        @endif

                        <div class="d-flex justify-content-center">
   <div class="col-md-6">
      <div class="white_shd full margin_bottom_30" style="margin-top: 100px;">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Data Payments</h2>
            </div>
         </div>
         <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
               <table class="table">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Nama Payments</th>
                        <th>Saldo</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     @php $no = 1; @endphp
                     @foreach ($dana as $data)
                        <tr>
                           <td>{{ $no++ }}</td>
                           <td>{{ $data->nama_dana }}</td>
                           <td>{{ number_format($data->saldo, 0, ',', '.') }}</td>
                           <td>
                              <a href="{{ route('dana.edit', $data->id) }}" class="btn btn-primary">Edit</a>
                              <a href="{{ route('dana.show', $data->id) }}" class="btn btn-warning">Show</a>
                              <form action="{{ route('dana.destroy', $data->id) }}" method="post" style="display: inline;">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Delete</button>
                              </form>
                           </td>
                        </tr>
                     @endforeach
                     <tr>
                     <tr>
   <td colspan="4" class="text-end">
      <a href="{{ route('dana.create') }}" class="btn btn-success">+ Tambah Dana</a>
   </td>
</tr>


                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- jQuery -->
      <script src="{{ asset('/admin/js/jquery.min.js') }}"></script>
      <script src="{{ asset('/admin/js/popper.min.js') }}"></script>
      <script src="{{ asset('/admin/js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('/admin/js/animate.js') }}"></script>
      <script src="{{ asset('/admin/js/bootstrap-select.js') }}"></script>
      <script src="{{ asset('/admin/js/owl.carousel.js') }}"></script>
      <script src="{{ asset('/admin/js/Chart.min.js') }}"></script>
      <script src="{{ asset('/admin/js/Chart.bundle.min.js') }}"></script>
      <script src="{{ asset('/admin/js/utils.js') }}"></script>
      <script src="{{ asset('/admin/js/analyser.js') }}"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
      <script src="{{ asset('/admin/js/perfect-scrollbar.min.js') }}"></script>
      <script>
         var ps = new PerfectScrollbar('#sidebar');
      </script>
      <script src="{{ asset('/admin/js/custom.js') }}"></script>
      <script src="{{ asset('/admin/js/chart_custom_style1.js') }}"></script>
   </body>
</html>
