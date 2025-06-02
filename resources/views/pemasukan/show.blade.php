@extends('layouts.admin')

@section('title', 'Detail Pemasukan')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-md-10" style="margin-left: 280px; padding: 20px;">
        <div id="printArea" class="white_shd full margin_bottom_30" style="margin-top: 100px;">
            <div class="full graph_head">
                <div class="heading1 margin_0">
                    <h2>Detail Pemasukan</h2>
                </div>
            </div>
            <div class="table_section padding_infor_info">
                <div class="table-responsive-sm">
                    <form>
                        <div class="form-group mb-3">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" class="form-control" value="{{ $pemasukan->deskripsi }}" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" class="form-control" value="Rp {{ number_format($pemasukan->jumlah, 0, ',', '.') }}" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="tanggal">Tanggal</label>
                            <input type="text" class="form-control" value="{{ $pemasukan->created_at->format('d M Y') }}" disabled>
                        </div>
                        <div class="form-group mb-3">
                            <label for="id_dana">Dompet</label>
                            <input type="text" class="form-control" value="{{ $pemasukan->dana->nama_dana }}" disabled>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="text-end d-print-none mt-3">
            <a href="{{ route('pemasukan.index') }}" class="btn btn-secondary">Kembali</a>
            <button type="button" class="btn btn-primary" onclick="printOnly()">Print</button>
        </div>
    </div>
</div>


<script>
    function printOnly() {
        const printContent = document.getElementById('printArea').innerHTML;
        const originalContent = document.body.innerHTML;

        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = originalContent;
        location.reload(); // reload biar kembali ke tampilan awal
    }
</script>
@endsection
