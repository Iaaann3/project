@extends('layouts.admin')

@section('title', 'Edit Dana')

@section('content')
<div class="d-flex justify-content-center">
   <div class="col-md-10" style="margin-left: 280px; padding: 20px;">
      <div class="white_shd full margin_bottom_30" style="margin-top: 100px;">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Edit Dompet</h2>
            </div>
         </div>
         <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
               <form action="{{ route('dana.update', $dana->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="form-group mb-3">
                     <label for="nama_dana">Nama Dompet</label>
                     <input type="text" name="nama_dana" class="form-control" value="{{ old('nama_dana', $dana->nama_dana) }}" required>
                  </div>
                  <div class="form-group mb-3">
                     <label for="saldo">Saldo</label>
                     <input type="number" name="saldo" class="form-control" value="{{ old('saldo', $dana->saldo) }}" required>
                  </div>
                  <div class="text-end">
                     <a href="{{ route('dana.index') }}" class="btn btn-secondary">Kembali</a>
                     <button type="submit" class="btn btn-primary">Update</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
