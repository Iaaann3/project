@extends('layouts.admin')

@section('title', 'Tambah Dana')

@section('content')
<div class="d-flex justify-content-center">
   <div class="col-md-10" style="margin-left: 280px; padding: 20px;">
      <div class="white_shd full margin_bottom_30" style="margin-top: 100px;">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Tambah Dompet</h2>
            </div>
         </div>
         <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
               <form action="{{ route('dana.store') }}" method="POST">
                  @csrf
                  <div class="form-group mb-3">
                     <label for="nama_dana">Nama Dompet</label>
                     <input type="text" name="nama_dana" class="form-control" placeholder="Masukkan nama Dompet" required>
                  </div>
                  <div class="form-group mb-3">
                     <label for="saldo">Saldo</label>
                     <input type="number" name="saldo" class="form-control" placeholder="Masukkan saldo" required>
                  </div>
                  <div class="text-end">
                     <a href="{{ route('dana.index') }}" class="btn btn-secondary">Kembali</a>
                     <button type="submit" class="btn btn-success">Simpan</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
