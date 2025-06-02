<?php

namespace App\Http\Controllers;

use App\Models\Dana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class DanaController extends Controller
{
    public function index()
    {
        $dana = Dana::where('user_id', Auth::id())->get();
        return view('dana.index', compact('dana'));
    }

    public function create()
    {
        $dana = Dana::where('user_id', Auth::id())->get();
        return view('dana.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_dana' => 'required|max:100',
            'saldo' => 'required|numeric|min:0',
        ]);

        $dana = new Dana;
        $dana->user_id = Auth::id(); // Menyimpan ID user
        $dana->nama_dana = $request->nama_dana;
        $dana->saldo = $request->saldo;
        $dana->save();

        Alert::success('Berhasil!', 'Dana berhasil ditambahkan!');
        return redirect()->route('dana.index');
    }

    public function show($id)
    {
        $dana = Dana::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('dana.show', compact('dana'));
    }

    public function edit($id)
    {
        $dana = Dana::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        return view('dana.edit', compact('dana'));
    }

    public function update(Request $request, $id)
    {
        $dana = Dana::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        $validated = $request->validate([
            'nama_dana' => 'required|max:100',
            'saldo' => 'required|numeric|min:0',
        ]);

        $dana->nama_dana = $request->nama_dana;
        $dana->saldo = $request->saldo;
        $dana->save();

        Alert::success('Berhasil!', 'Dana berhasil diperbarui!');
        return redirect()->route('dana.index');
    }

    public function destroy($id)
    {
        $dana = Dana::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $dana->delete();

        Alert::success('Berhasil!', 'Dana berhasil dihapus!');
        return redirect()->route('dana.index');
    }
    public function transferForm()
{
    $danas = Dana::where('user_id', Auth::id())->get();
    return view('dana.transfer', compact('danas'));
}

public function transfer(Request $request)
{
    $request->validate([
        'from_dana' => 'required|different:to_dana',
        'to_dana' => 'required',
        'jumlah' => 'required|numeric|min:1',
    ]);

    DB::beginTransaction();
    try {
        $from = Dana::where('id', $request->from_dana)->where('user_id', Auth::id())->firstOrFail();
        $to = Dana::where('id', $request->to_dana)->where('user_id', Auth::id())->firstOrFail();

        if ($from->saldo < $request->jumlah) {
            Alert::error('Gagal', 'Saldo tidak cukup untuk transfer.');
            return back();
        }

        $from->saldo -= $request->jumlah;
        $to->saldo += $request->jumlah;

        $from->save();
        $to->save();

        DB::commit();
        Alert::success('Berhasil!', 'Transfer berhasil dilakukan.');
        return redirect()->route('dana.index');
    } catch (\Exception $e) {
        DB::rollBack();
        Alert::error('Transfer Gagal', $e->getMessage());
        return back();
    }
}


}
