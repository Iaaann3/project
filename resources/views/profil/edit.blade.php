<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<div class="container" style="margin-left: 130px; padding: 20px;">
  <h3>Edit Profil</h3>

  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @if($errors->any())
    <div class="alert alert-danger">
      <ul class="mb-0">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
      <label>Nama Lengkap</label>
      <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $user->nama_lengkap) }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Username</label>
      <input type="text" name="username" value="{{ old('username', $user->username) }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Email</label>
      <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Jenis Kelamin</label>
      <select name="jenis_kelamin" class="form-control" required>
        <option value="L" {{ $user->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
        <option value="P" {{ $user->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
      </select>
    </div>

    <div class="mb-3">
      <label>Alamat</label>
      <textarea name="alamat" class="form-control">{{ old('alamat', $user->alamat) }}</textarea>
    </div>

    <div class="mb-3">
      <label>No. Telepon</label>
      <input type="text" name="no_telp" value="{{ old('no_telp', $user->no_telp) }}" class="form-control" required>
    </div>

    <div class="mb-3">
      <label>Foto Profil</label><br>

      @if($user->foto && file_exists(public_path('storage/foto/' . $user->foto)))
          <img src="{{ asset('storage/foto/' . $user->foto) }}?v={{ filemtime(public_path('storage/foto/' . $user->foto)) }}" 
               width="100" class="mb-2 rounded-circle" id="preview-image">
      @else
          <img src="{{ asset('images/layout_img/defaultl.jpg') }}" 
               width="100" class="mb-2 rounded-circle" id="preview-image">
      @endif

      <input type="file" name="foto" class="form-control" accept="image/jpeg,image/png,image/jpg" 
             onchange="previewImage(event)">
      <small class="text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB</small>
    </div>

    <button type="submit" class="btn btn-success">Simpan Perubahan</button>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>
  </form>
  
</div>

<script>
function previewImage(event) {
    const file = event.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>