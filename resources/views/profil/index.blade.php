<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<section style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row">
      <div class="col">
        <nav aria-label="breadcrumb" class="bg-body-tertiary rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Kembali</a></li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
          <img src="{{ $user->foto && file_exists(public_path('storage/foto/' . $user->foto)) 
    ? asset('storage/foto/' . $user->foto) . '?v=' . filemtime(public_path('storage/foto/' . $user->foto))
    : asset('images/layout_img/defaultl.jpg') }}"
    alt="Profile Photo" class="rounded-circle img-fluid" style="width: 150px; height: 150px; object-fit: cover;">
            <!-- <img src="{{ asset('images/layout_img/profile-user.png') }}" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;"> -->
            <h5 class="my-3">{{ Auth::user()->nama_lengkap }}</h5>
            <p class="text-muted mb-1">{{ Auth::user()->username }}</p>
            <p class="text-muted mb-4">{{ Auth::user()->alamat ?? 'Belum diisi' }}</p>
            <a href="{{ route('profil.edit') }}" class="btn btn-primary mt-3">
  <i class="fa fa-edit me-1"></i> Edit Profil
</a>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Nama Lengkap</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->nama_lengkap }}</p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Username</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->username }}</p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->email }}</p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Jenis Kelamin</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">
                  {{ Auth::user()->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                </p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">No. Telepon</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->no_telp }}</p>
              </div>
            </div>
            <hr>

            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Alamat</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{ Auth::user()->alamat ?? '-' }}</p>
              </div>
            </div>
            <hr>
<div class="row">
  <div class="col-sm-3">
    <p class="mb-0">Bergabung</p>
  </div>
  <div class="col-sm-9">
    <p class="text-muted mb-0">
      {{ Auth::user()->created_at->format('d M Y') }}
      {{ Auth::user()->created_at->diffForHumans() }}
    </p>
  </div>
</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
