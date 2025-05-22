@extends('layouts.app')

@section('content')
<section class="vh-100" style="background-image: url({{ asset('images/logo/background.jpg') }}); height: 200px; background-size: cover; background-position: center;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
            <img src="{{ asset('images/logo/login3.jpg') }}"
                alt="login form"
                class="img-fluid h-100 w-100 object-fit-cover"
                style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST" action="{{ route('login') }}">
                  @csrf

                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0">Login</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Masuk Ke Akun Anda</h5>

                  <div class="form-outline mb-4">
                    <input type="email" id="email" name="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required autocomplete="email" autofocus />
                    <label class="form-label" for="email">Email</label>
                    @error('email')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="password" name="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                           required autocomplete="current-password" />
                    <label class="form-label" for="password">Password</label>
                    @error('password')
                      <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                  </div>

                  <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                      Remember Me
                    </label>
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                  </div>

                  @if (Route::has('password.request'))
                    <a class="small text-muted" href="{{ route('password.request') }}">Lupa password?</a>
                  @endif

                  <p class="mb-5 pb-lg-2" style="color: #393f81;">
                    Belum Punya akun?
                    <a href="{{ route('register') }}" style="color: #393f81;">Register here</a>
                  </p>
                  <a href="#!" class="small text-muted">Terms of use.</a>
                  <a href="#!" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
