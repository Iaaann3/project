<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\Dana;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluaran = Pengeluaran::all();
        return view('pengeluaran.index', compact('pengeluaran'));
    }

    public function create()
    {
        $dana = Dana::all();
        return view('pengeluaran.create', compact('dana'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'required|max:100',
            'jumlah' => 'required|numeric|min:0',
            'id_dana' => 'required|exists:dana,id',
        ]);

        $pengeluaran = new Pengeluaran;
        $pengeluaran->deskripsi = $request->deskripsi;
        $pengeluaran->jumlah = $request->jumlah;
        $pengeluaran->id_dana = $request->id_dana;
        $pengeluaran->save();

        Alert::success('Berhasil!', 'Pengeluaran berhasil ditambahkan!');
        return redirect()->route('pengeluaran.index');
    }

    public function show($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        return view('pengeluaran.show', compact('pengeluaran'));
    }

    public function edit($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $dana = Dana::all();
        return view('pengeluaran.edit', compact('pengeluaran', 'dana'));
    }

    public function update(Request $request, $id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);

        $validated = $request->validate([
            'deskripsi' => 'required|max:100',
            'jumlah' => 'required|numeric|min:0',
            'id_dana' => 'required|exists:dana,id',
        ]);

        $pengeluaran->deskripsi = $request->deskripsi;
        $pengeluaran->jumlah = $request->jumlah;
        $pengeluaran->id_dana = $request->id_dana;
        $pengeluaran->save();

        Alert::success('Berhasil!', 'Pengeluaran berhasil diperbarui!');
        return redirect()->route('pengeluaran.index');
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::findOrFail($id);
        $pengeluaran->delete();

        Alert::success('Berhasil!', 'Pengeluaran berhasil dihapus!');
        return redirect()->route('pengeluaran.index');
    }
}
