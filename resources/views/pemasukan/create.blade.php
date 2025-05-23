@extends('layouts.admin')

@section('title', 'Tambah Pemasukan')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-md-10" style="margin-left: 280px; padding: 20px;">
    <div class="white_shd full margin_bottom_30" style="margin-top: 100px;">
        <div class="full graph_head">
            <div class="heading1 margin_0">
            <h2>Tambah Pemasukan</h2>
            </div>
        </div>
        <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
               <form action="{{ route('pemasukan.store') }}" method="POST">
                  @csrf
                  <div class="form-group mb-3">
                     <label for="deskripsi">Deskripsi</label>
                     <input type="text" name="deskripsi" class="form-control" placeholder="Masukkan deskripsi pemasukan" required>
                  </div>
                  <div class="form-group mb-3">
                     <label for="jumlah">Jumlah</label>
                     <input type="number" name="jumlah" step="0.01" class="form-control" placeholder="Masukkan jumlah" required>
                  </div>
                  <div class="form-group mb-3">
   <label for="tanggal">Tanggal</label>
   <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}" required>
</div>
                  <div class="form-group mb-3">
                     <label for="id_dana">Dompet</label>
                     <select name="id_dana" class="form-control" required>
                        <option value="" disabled selected>Pilih Dompet</option>
                        @foreach($dana as $data)
                           <option value="{{ $data->id }}">{{ $data->nama_dana }} (Rp {{ number_format($data->saldo, 0, ',', '.') }})</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="text-end">
                     <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
                     <button type="submit" class="btn btn-success">Simpan</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
