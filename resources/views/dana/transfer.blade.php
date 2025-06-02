@extends('layouts.admin')

@section('title', 'Transfer Dana')

@section('content')
<div class="d-flex justify-content-center">
   <div class="col-md-10" style="margin-left: 280px; padding: 20px;">
      <div class="white_shd full margin_bottom_30" style="margin-top: 100px;">
         <div class="full graph_head">
            <div class="heading1 margin_0">
               <h2>Transfer Dana</h2>
            </div>
         </div>
         <div class="table_section padding_infor_info">
            <div class="table-responsive-sm">
               @if(session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
               @endif

               @if(session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
               @endif

               <form method="POST" action="{{ route('dana.transfer') }}">
                  @csrf
                  <div class="form-group mb-3">
                     <label for="from_dana">Dari Dompet</label>
                     <select name="from_dana" class="form-control" required>
                        <option value=""> Pilih Dompet </option>
                        @foreach ($danas as $dana)
                           <option value="{{ $dana->id }}">{{ $dana->nama_dana }} - Rp{{ number_format($dana->saldo, 0, ',', '.') }}</option>
                        @endforeach
                     </select>
                  </div>

                  <div class="form-group mb-3">
                     <label for="to_dana">Ke Dompet</label>
                     <select name="to_dana" class="form-control" required>
                        <option value=""> Pilih Dompet </option>
                        @foreach ($danas as $dana)
                           <option value="{{ $dana->id }}">{{ $dana->nama_dana }}</option>
                        @endforeach
                     </select>
                  </div>

                  <div class="form-group mb-3">
                     <label for="jumlah">Jumlah Transfer</label>
                     <input type="number" name="jumlah" class="form-control" required>
                  </div>

                  <div class="text-end">
                     <a href="{{ route('dana.index') }}" class="btn btn-secondary">Kembali</a>
                     <button type="submit" class="btn btn-primary">Transfer</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
