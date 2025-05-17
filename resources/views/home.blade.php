<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Judul Halaman')</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- site icon -->
<link rel="icon" href="{{ asset('admin/images/fevicon.png') }}" type="image/png" />

<!-- bootstrap css -->
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap.min.css') }}" />

<!-- site css -->
<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" />

<!-- responsive css -->
<link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}" />

<!-- color css -->
<link rel="stylesheet" href="{{ asset('admin/css/colors.css') }}" />

<!-- select bootstrap -->
<link rel="stylesheet" href="{{ asset('admin/css/bootstrap-select.css') }}" />

<!-- scrollbar css -->
<link rel="stylesheet" href="{{ asset('admin/css/perfect-scrollbar.css') }}" />

<!-- custom css -->
<link rel="stylesheet" href="{{ asset('admin/css/custom.css') }}" />

<!-- calendar file css -->
<link rel="stylesheet" href="{{ asset('admin/js/semantic.min.css') }}" />

</head>
<body>

    {{-- Navbar, Sidebar, dsb --}}
    @include('layouts.part.navbar')
    @include('layouts.part.sidebar')

    {{-- Isi halaman --}}
    <div class="main-content"  style="margin-left: 280px; padding: 20px;">
    <div class="main-content">
        @yield('content')
        <div class="container-fluid py-4">
      @yield('content')
      
      <h3 class="mb-3 text-white">Dompet anda</h3>
      
      <div class="d-flex overflow-auto" style="white-space: nowrap;">
        @php $no = 1; @endphp
        @foreach ($dana as $data)
          <div class="card me-3 bg-transparent shadow-xl" style="min-width: 350px">
            <div class="overflow-hidden position-relative border-radius-xl" style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/card-visa.jpg');">
              <span class="mask bg-gradient-dark"></span>
              <div class="card-body position-relative z-index-1 p-3">
                <i class="fas fa-wifi text-white p-2"></i>
                <h5 class="text-white mt-4 mb-1 pb-2">{{ $data->nama_dana }}</h5>
                <p class="text-white">Saldo : Rp. {{ number_format($data->saldo) }}</p>
                <div class="d-flex">
                  <div class="d-flex">
                    <div class="me-4">
                      <p class="text-white text-sm opacity-8 mb-0">Pemilik Dompet</p>
                      <h6 class="text-white mb-0">{{ Auth::user()->username }}</h6>
                    </div>
                    <div>
                      <p class="text-white text-sm opacity-8 mb-0">tanggal</p>
                      <h6 class="text-white mb-0">{{ $data->created_at}}</h6>
                    </div>
                </div>
                <div class="ms-auto w-20 d-flex align-items-end justify-content-end">
                <img class="mt-2" style="width: 60%;" src="{{ asset('admin/images/logo/mastercard.png')}}" alt="logo">
                </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>

    <div class="row column1">
                        <div class="col-lg-6">
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Line Chart</h2>
                                 </div>
                              </div>
                              <div class="map_section padding_infor_info">
                                 <canvas id="line_chart"></canvas>
                              </div>
                           </div>
                        </div>
                    </div>
    

    <!-- JS -->
    <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Your Custom JS -->
<script src="{{ asset('/admin/js/Chart.min.js') }}"></script>
<script src="{{ asset('/admin/js/custom.js') }}"></script>
<!-- jQuery -->
<script src="{{ asset('admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('admin/js/popper.min.js') }}"></script>
<script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

<!-- Chart JS -->
<script src="{{ asset('admin/js/Chart.min.js') }}"></script>
<script src="{{ asset('admin/js/Chart.bundle.min.js') }}"></script>
<script src="{{ asset('admin/js/utils.js') }}"></script>
<script src="{{ asset('admin/js/analyser.js') }}"></script>

<!-- Wow Animation -->
<script src="{{ asset('admin/js/animate.js') }}"></script>

<!-- Select Bootstrap -->
<script src="{{ asset('admin/js/bootstrap-select.js') }}"></script>

<!-- Owl Carousel -->
<script src="{{ asset('admin/js/owl.carousel.js') }}"></script>

<!-- Nice Scrollbar -->
<script src="{{ asset('admin/js/perfect-scrollbar.min.js') }}"></script>

<!-- Sidebar Scroll Init -->
<script>
  var ps = new PerfectScrollbar('#sidebar');
</script>

<!-- Custom JS -->
<script src="{{ asset('admin/js/custom.js') }}"></script>

</body>
</html>

