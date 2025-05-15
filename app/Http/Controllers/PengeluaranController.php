<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use App\Models\Dana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PengeluaranController extends Controller
{
    public function index()
    {
        $pengeluaran = Pengeluaran::whereHas('dana', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('pengeluaran.index', compact('pengeluaran'));
    }

    public function create()
    {
        $dana = Dana::where('user_id', Auth::id())->get();
        return view('pengeluaran.create', compact('dana'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'deskripsi' => 'required|max:100',
            'jumlah' => 'required|numeric|min:0',
            'id_dana' => 'required|exists:danas,id',
        ]);

        $dana = Dana::where('id', $request->id_dana)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        // Kurangi saldo
        if ($dana->saldo < $request->jumlah) {
            Alert::error('Gagal!', 'Saldo tidak mencukupi.');
            return back();
        }

        $pengeluaran = new Pengeluaran;
        $pengeluaran->deskripsi = $request->deskripsi;
        $pengeluaran->jumlah = $request->jumlah;
        $pengeluaran->id_dana = $dana->id;
        $pengeluaran->save();

        $dana->saldo -= $request->jumlah;
        $dana->save();

        Alert::success('Berhasil!', 'Pengeluaran berhasil ditambahkan!');
        return redirect()->route('pengeluaran.index');
    }

    public function show($id)
    {
        $pengeluaran = Pengeluaran::where('id', $id)
            ->whereHas('dana', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->firstOrFail();

        return view('pengeluaran.show', compact('pengeluaran'));
    }

    public function edit($id)
    {
        $pengeluaran = Pengeluaran::where('id', $id)
            ->whereHas('dana', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->firstOrFail();

        $dana = Dana::where('user_id', Auth::id())->get();

        return view('pengeluaran.edit', compact('pengeluaran', 'dana'));
    }

    public function update(Request $request, $id)
    {
        $pengeluaran = Pengeluaran::where('id', $id)
            ->whereHas('dana', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->firstOrFail();

        $validated = $request->validate([
            'deskripsi' => 'required|max:100',
            'jumlah' => 'required|numeric|min:0',
            'id_dana' => 'required|exists:danas,id',
        ]);

        $dana = Dana::where('id', $request->id_dana)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        // Jika jumlah berubah, hitung selisih
        $selisih = $request->jumlah - $pengeluaran->jumlah;

        if ($dana->saldo < $selisih) {
            Alert::error('Gagal!', 'Saldo tidak mencukupi untuk pengeluaran ini.');
            return back();
        }

        // Update data
        $pengeluaran->deskripsi = $request->deskripsi;
        $pengeluaran->jumlah = $request->jumlah;
        $pengeluaran->id_dana = $dana->id;
        $pengeluaran->save();

        $dana->saldo -= $selisih;
        $dana->save();

        Alert::success('Berhasil!', 'Pengeluaran berhasil diperbarui!');
        return redirect()->route('pengeluaran.index');
    }

    public function destroy($id)
    {
        $pengeluaran = Pengeluaran::where('id', $id)
            ->whereHas('dana', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->firstOrFail();

        $dana = $pengeluaran->dana;
        $dana->saldo += $pengeluaran->jumlah;
        $dana->save();

        $pengeluaran->delete();

        Alert::success('Berhasil!', 'Pengeluaran berhasil dihapus!');
        return redirect()->route('pengeluaran.index');
    }
}
