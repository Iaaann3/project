@extends('layouts.admin')

@section('title', 'Edit Pemasukan')

@section('content')
<div class="row mt-4" style="margin-left: 50px; padding: 20px;">
    <div class="col-md-10 offset-md-2 mt-4" >
        <div class="card">
            <div class="card-header pb-0 px-3">
                <h6 class="mb-0">Edit Data Pemasukan</h6>
            </div>
            <div class="card-body pt-4 p-3">
                <form action="{{ route('pemasukan.update', $pemasukan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="form-group mb-3">
                        <label for="deskripsi">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" value="{{ old('deskripsi', $pemasukan->deskripsi) }}" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" name="jumlah" step="0.01" class="form-control" value="{{ old('jumlah', $pemasukan->jumlah) }}" required>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', $pemasukan->tanggal) }}" required>
                    </div>
                    
                    <div class="form-group mb-4">
                        <label for="id_dana">Pilih Dompet</label>
                        <select name="id_dana" class="form-control" required>
                            <option value="" disabled>Pilih Dompet</option>
                            @foreach($dana as $data)
                                <option value="{{ $data->id }}" {{ $pemasukan->id_dana == $data->id ? 'selected' : '' }}>
                                    {{ $data->nama_dana }} (Rp {{ number_format($data->saldo, 0, ',', '.') }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="text-end">
                        <a href="{{ route('home') }}" class="btn btn-secondary">Kembali</a>
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
