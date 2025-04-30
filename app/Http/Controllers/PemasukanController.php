<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Dana;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PemasukanController extends Controller
{
    public function index()
    {
        $pemasukan = Pemasukan::all();
        return view('pemasukan.index', compact('pemasukan'));
    }

    public function create()
    {
        $dana = Dana::all(); // Menampilkan daftar dana
        return view('pemasukan.create', compact('dana'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'required|max:100',
            'jumlah' => 'required|numeric|min:0',
            'id_dana' => 'required|exists:dana,id',
        ]);

        $pemasukan = new Pemasukan;
        $pemasukan->deskripsi = $request->deskripsi;
        $pemasukan->jumlah = $request->jumlah;
        $pemasukan->id_dana = $request->id_dana;
        $pemasukan->save();

        Alert::success('Berhasil!', 'Pemasukan berhasil ditambahkan!');
        return redirect()->route('pemasukan.index');
    }

    public function show($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        return view('pemasukan.show', compact('pemasukan'));
    }

    public function edit($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $dana = Dana::all();
        return view('pemasukan.edit', compact('pemasukan', 'dana'));
    }

    public function update(Request $request, $id)
    {
        $pemasukan = Pemasukan::findOrFail($id);

        $validated = $request->validate([
            'deskripsi' => 'required|max:100',
            'jumlah' => 'required|numeric|min:0',
            'id_dana' => 'required|exists:dana,id',
        ]);

        $pemasukan->deskripsi = $request->deskripsi;
        $pemasukan->jumlah = $request->jumlah;
        $pemasukan->id_dana = $request->id_dana;
        $pemasukan->save();

        Alert::success('Berhasil!', 'Pemasukan berhasil diperbarui!');
        return redirect()->route('pemasukan.index');
    }

    public function destroy($id)
    {
        $pemasukan = Pemasukan::findOrFail($id);
        $pemasukan->delete();

        Alert::success('Berhasil!', 'Pemasukan berhasil dihapus!');
        return redirect()->route('pemasukan.index');
    }
}
