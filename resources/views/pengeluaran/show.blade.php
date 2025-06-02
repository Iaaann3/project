@extends('layouts.admin')

@section('title', 'Detail Pengeluaran')

@section('content')
<style>
@media print {
    /* Sembunyikan semua elemen */
    body * {
        visibility: hidden;
    }
    
    /* Tampilkan hanya area print */
    #printArea, #printArea * {
        visibility: visible;
    }
    
    /* Posisikan area print */
    #printArea {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
    }
    
    /* Sembunyikan elemen yang tidak perlu */
    .d-print-none {
        display: none !important;
    }
    
    /* Reset margin untuk print */
    body {
        margin: 0 !important;
        padding: 0 !important;
    }
}
</style>

<div class="d-flex justify-content-center">
    <div class="col-md-10" style="margin-left: 280px; padding: 20px;">
        <div id="printArea" class="white_shd full margin_bottom_30" style="margin-top: 100px;">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Detail Pengeluaran</h2>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                    <form>
                        <div class="form-group mb-3">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" value="{{ $pengeluaran->deskripsi }}" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control" value="Rp {{ number_format($pengeluaran->jumlah, 0, ',', '.') }}" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tanggal">Tanggal</label>
                            <input type="text" class="form-control" value="{{ $pengeluaran->created_at->format('d M Y') }}" disabled> 
                        </div>
                        <div class="form-group mb-3">
                            <label for="id_dana">Dompet</label>
                            <input type="text" class="form-control" value="{{ $pengeluaran->dana->nama_dana ?? '-' }}" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="text-end d-print-none mt-3">
            <a href="{{ route('pengeluaran.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="button" class="btn btn-primary" onclick="window.print()">Print</button>
        </div>
    </div>
</div>

@endsection