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
                    <img class="w-60 mt-2" src="{{ asset('admin/img/logos/mastercard.png')}}" alt="logo">
                  </div>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

      <div class="row mt-4">
        <div class="col-lg-7 mb-lg-0 mb-4">
          <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
              <h6 class="text-capitalize">Diagram Keuanganmu</h6>
              <p class="text-sm mb-0">
                <i class="fa fa-arrow-up text-success"></i>
                <span class="font-weight-bold">test</span>
              </p>
            </div>
            <div class="card-body p-3">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="300"></canvas>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>