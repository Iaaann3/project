@extends('layouts.app')

@section('content')
<section class="vh-200" style="background-image: url({{ asset('images/logo/background2.jpg') }}); height: 100%; background-size: cover; background-position: center;">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-10 col-xl-10">
        <div class="card text-black" style="border-radius: 25px;">
          <div class="card-body p-md-5">
            <div class="row justify-content-center align-items-center">

              <!-- Form -->
              <div class="col-md-6 order-2 order-lg-1">

                <p class="text-center h1 fw-bold mb-4 mt-2">Sign Up</p>

                <form method="POST" action="{{ route('register') }}">
                  @csrf

                  <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is-invalid @enderror"
                      value="{{ old('nama_lengkap') }}" required />
                    @error('nama_lengkap')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                      value="{{ old('username') }}" required />
                    @error('username')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                      value="{{ old('email') }}" required />
                    @error('email')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" required>
                      <option value="">Pilih</option>
                      <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                      <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" required>{{ old('alamat') }}</textarea>
                    @error('alamat')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">No Telepon</label>
                    <input type="text" name="no_telp" class="form-control @error('no_telp') is-invalid @enderror"
                      value="{{ old('no_telp') }}" required />
                    @error('no_telp')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required />
                    @error('password')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="mb-4">
                    <label class="form-label">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" class="form-control" required />
                  </div>

                  <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" value="" required />
                    <label class="form-check-label">Saya setuju dengan <a href="#">syarat & ketentuan</a></label>
                  </div>

                  <div class="d-flex justify-content-center mb-3">
                    <button type="submit" class="btn btn-primary btn-lg">Register</button>
                  </div>

                  <p class="text-center text-muted mt-3">Sudah punya akun? 
                    <a href="{{ route('login') }}" class="fw-bold text-body"><u>Login di sini</u></a>
                  </p>

                </form>

              </div>

              <!-- Gambar -->
              <div class="col-md-6 order-1 order-lg-2 d-flex justify-content-center">
                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/draw1.webp"
                  class="img-fluid" alt="Sample image" style="max-width: 100%; height: auto;">
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
