<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Dana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PemasukanController extends Controller
{
    public function index()
    {
        $pemasukan = Pemasukan::whereHas('dana', function ($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('pemasukan.index', compact('pemasukan'));
    }

    public function create()
    {
        $dana = Dana::where('user_id', Auth::id())->get();
        return view('pemasukan.create', compact('dana'));
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

        $pemasukan = new Pemasukan;
        $pemasukan->deskripsi = $request->deskripsi;
        $pemasukan->jumlah = $request->jumlah;
        $pemasukan->id_dana = $dana->id;
        $pemasukan->save();

        $dana->saldo += $request->jumlah;
        $dana->save();

        Alert::success('Berhasil!', 'Pemasukan berhasil ditambahkan!');
        return redirect()->route('pemasukan.index');
    }

    public function show($id)
    {
        $pemasukan = Pemasukan::where('id', $id)
            ->whereHas('dana', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->firstOrFail();

        return view('pemasukan.show', compact('pemasukan'));
    }

    public function edit($id)
    {
        $pemasukan = Pemasukan::where('id', $id)
            ->whereHas('dana', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->firstOrFail();

        $dana = Dana::where('user_id', Auth::id())->get();

        return view('pemasukan.edit', compact('pemasukan', 'dana'));
    }

    public function update(Request $request, $id)
    {
        $pemasukan = Pemasukan::where('id', $id)
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

        // Jika pindah dana, saldo lama tidak dikembalikan (bisa ditambah jika perlu)
        $pemasukan->deskripsi = $request->deskripsi;
        $pemasukan->jumlah = $request->jumlah;
        $pemasukan->id_dana = $dana->id;
        $pemasukan->save();

        Alert::success('Berhasil!', 'Pemasukan berhasil diperbarui!');
        return redirect()->route('pemasukan.index');
    }

    public function destroy($id)
    {
        $pemasukan = Pemasukan::where('id', $id)
            ->whereHas('dana', function ($query) {
                $query->where('user_id', Auth::id());
            })
            ->firstOrFail();

        $pemasukan->delete();

        Alert::success('Berhasil!', 'Pemasukan berhasil dihapus!');
        return redirect()->route('pemasukan.index');
    }
}
