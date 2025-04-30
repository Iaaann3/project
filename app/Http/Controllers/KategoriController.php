<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('kategori.index', compact('kategori'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kategori' => 'required|max:100',
            'deskripsi' => 'nullable',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $kategori = new Kategori;
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi = $request->deskripsi;

        if ($request->hasFile('cover')) {
            $img = $request->file('cover');
            $name = rand(1000, 9999) . '_' . $img->getClientOriginalName();
            $img->move('images/kategori', $name);
            $kategori->cover = $name;
        }

        $kategori->save();

        Alert::success('Berhasil!', 'Kategori berhasil ditambahkan!');
        return redirect()->route('kategori.index');
    }

    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.show', compact('kategori'));
    }

    public function edit($id)
    {
        $kategori = Kategori::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $validated = $request->validate([
            'nama_kategori' => 'required|max:100',
            'deskripsi' => 'nullable',
            'cover' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->deskripsi = $request->deskripsi;

        if ($request->hasFile('cover')) {
            if ($kategori->cover && file_exists(public_path('images/kategori/' . $kategori->cover))) {
                unlink(public_path('images/kategori/' . $kategori->cover));
            }
            $img = $request->file('cover');
            $name = rand(1000, 9999) . '_' . $img->getClientOriginalName();
            $img->move('images/kategori', $name);
            $kategori->cover = $name;
        }

        $kategori->save();
        Alert::success('Berhasil!', 'Kategori berhasil diperbarui!');
        return redirect()->route('kategori.index');
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);

        if ($kategori->cover && file_exists(public_path('images/kategori/' . $kategori->cover))) {
            unlink(public_path('images/kategori/' . $kategori->cover));
        }

        $kategori->delete();
        Alert::success('Berhasil!', 'Kategori berhasil dihapus!');
        return redirect()->route('kategori.index');
    }
}
