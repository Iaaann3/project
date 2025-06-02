<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pengeluaran</title>
        <link href="{{ asset('/images/logo/smar.png') }}" rel="icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        <link rel="icon" href="{{ asset('/admin/images/fevicon.png') }}" type="image/png" />
        <link rel="stylesheet" href="{{ asset('/admin/css/bootstrap.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('/admin/css/style.css') }}" />
        <link rel="stylesheet" href="{{ asset('/admin/css/responsive.css') }}" />
        <link rel="stylesheet" href="{{ asset('/admin/css/colors.css') }}" />
        <link rel="stylesheet" href="{{ asset('/admin/css/bootstrap-select.css') }}" />
        <link rel="stylesheet" href="{{ asset('/admin/css/perfect-scrollbar.css') }}" />
        <link rel="stylesheet" href="{{ asset('/admin/css/custom.css') }}" />
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
                    <h1 class="page-header">Pengeluaran</h1>
                    </div>
                </div>
                <div class="row">
                <div class="panel-body">
                    <div class="card-body">


                        <div class="d-flex justify-content-center">
                           <div class="col-md-10" style="margin-left: 280px; padding: 20px;">
                              <div class="white_shd full margin_bottom_30" style="margin-top: 100px;">
                                 <div class="full graph_head">
                                    <div class="heading1 margin_0">
                                       <h2>Data Pengeluaran</h2>
                                    </div>
                                 </div>
                                 <div class="table_section padding_infor_info">
                                    <div class="table-responsive-sm">
                                       <table class="table">
                                          <thead>
                                             <tr>
                                                <th>No</th>
                                                <th>Deskripsi</th>
                                                <th>Jumlah</th>
                                                <th>Dompet</th>
                                                <th>Tanggal</th>
                                                <th>Aksi</th>
                                             </tr>
                                          </thead>
                                          <tbody>
                                             @php $no = 1; @endphp
                                             @foreach ($pengeluaran as $item)
                                                <tr>
                                                   <td>{{ $no++ }}</td>
                                                   <td>{{ $item->deskripsi }}</td>
                                                   <td>{{ number_format($item->jumlah, 0, ',', '.') }}</td>
                                                   <td>{{ $item->dana->nama_dana ?? '-' }}</td>
                                                   <td>{{ $item->created_at->format('d M Y') }}</td>
                                                   <td>
                              <!-- <a href="{{ route('pengeluaran.edit', $item->id) }}" class="btn btn-primary">Edit</a> -->
                              <a href="{{ route('pengeluaran.show', $item->id) }}" class="btn btn-warning">Show</a>
                              <form action="{{ route('pengeluaran.destroy', $item->id) }}" method="post" style="display: inline;">
                                 @csrf
                                 @method('DELETE')
                                 <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?')">Delete</button>
                              </form>
                           </td>
                                                </tr>
                                             @endforeach
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


      <!-- JS -->
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
