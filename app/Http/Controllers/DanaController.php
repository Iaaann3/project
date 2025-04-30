<?php

namespace App\Http\Controllers;

use App\Models\Dana;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class DanaController extends Controller
{
    public function index()
    {
        $dana = Dana::all();
        return view('dana.index', compact('dana'));
    }

    public function create()
    {
        return view('dana.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_dana' => 'required|max:100',
            'saldo' => 'required|numeric|min:0',
        ]);

        $dana = new Dana;
        $dana->nama_dana = $request->nama_dana;
        $dana->saldo = $request->saldo;
        $dana->save();

        Alert::success('Berhasil!', 'Dana berhasil ditambahkan!');
        return redirect()->route('dana.index');
    }

    public function show($id)
    {
        $dana = Dana::findOrFail($id);
        return view('dana.show', compact('dana'));
    }

    public function edit($id)
    {
        $dana = Dana::findOrFail($id);
        return view('dana.edit', compact('dana'));
    }

    public function update(Request $request, $id)
    {
        $dana = Dana::findOrFail($id);

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
        $dana = Dana::findOrFail($id);
        $dana->delete();

        Alert::success('Berhasil!', 'Dana berhasil dihapus!');
        return redirect()->route('dana.index');
    }
}
