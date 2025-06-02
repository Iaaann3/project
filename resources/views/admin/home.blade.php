<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pengguna</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
</head>



    <!-- Navbar -->
    @include('layouts.part.navbar')
    @include('layouts.part.admin_sidebar')
    <!-- Konten Utama -->
    <div class="container py-5" style="margin-left: 280px; padding: 50px;">
    <div class="container py-5" style="margin-top: 100px;">
        <h2 class="mb-4">Tabel Data Pengguna</h2>

       <div class="row column1">
    <div class="col-md-6 col-lg-6">
        <div class="full counter_section margin_bottom_30 d-flex align-items-center p-3 shadow rounded" style="background-color: #fff;">
            <div class="couter_icon me-3">
                <i class="fa fa-user yellow_color fa-3x"></i>
            </div>
            <div class="counter_no">
                <p class="total_no mb-1" style="font-weight: 600;">Total Pengguna</p>
                <p class="head_couter fs-4 m-0">{{ $totalUsers }}</p>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-6">
        <div class="full counter_section margin_bottom_30 d-flex align-items-center p-3 shadow rounded" style="background-color: #fff;">
            <div class="couter_icon me-3">
                <i class="fa fa-wallet green_color fa-3x"></i>
            </div>
            <div class="counter_no">
                <p class="total_no mb-1" style="font-weight: 600;">Total Semua Dana</p>
                <p class="head_couter fs-4 m-0">Rp {{ number_format($totalDana, 0, ',', '.') }}</p>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center">
   <div class="col-md-12" >
      <div class="white_shd full margin_bottom_30" style="margin-top: 100px;">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Data Pengguna</h2>
            </div>
         </div>
         <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
               <table class="table">
                  <thead>
                     <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Saldo</th>
                        <th>Dompet</th>
                        <th>Tanggal Pembuatan Akun</th>
                     </tr>
                  </thead>
                  <tbody>
                     @forelse ($users as $user)
                        <tr>
                           <td>{{ $loop->iteration }}</td>
                           <td>{{ $user->nama_lengkap }}</td>
                           <td>Rp{{ number_format($user->danas->sum('saldo') ?? 0, 0, ',', '.') }}</td>
                           <td>{{ $user->danas->pluck('nama_dana')->join(', ') ?: '-' }}</td>
                           <td>{{ $user->created_at->format('d-m-Y') }}</td>
                        </tr>
                     @empty
                        <tr>
                           <td colspan="5" class="text-center">Tidak ada data pengguna.</td>
                        </tr>
                     @endforelse
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>

</div>

        <!-- <div class="table-responsive bg-white shadow rounded p-3">
            <table class="table table-bordered table-hover">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Saldo</th>
                        <th>Dompet</th>
                        <th>Tanggal Pembuatan Akun</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->nama_lengkap }}</td>
                            <td>Rp{{ number_format($user->danas->sum('saldo') ?? 0, 0, ',', '.') }}</td>
                            <td>{{ $user->danas->pluck('nama_dana')->join(', ') ?: '-' }}</td>
                            <td>{{ $user->created_at->format('d-m-Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data pengguna.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div> -->
    </div>

    
</body>
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
</html>