<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Berita;

class BeritaController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->paginate(5);
        return view('admin.berita.index', compact('beritas'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambar = null;
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => $gambar,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }


    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($berita->gambar) Storage::disk('public')->delete($berita->gambar);
            $gambar = $request->file('gambar')->store('berita', 'public');
            $berita->gambar = $gambar;
        }

        $berita->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diubah.');
    }

    public function destroy(Berita $berita)
    {
        if ($berita->gambar) Storage::disk('public')->delete($berita->gambar);
        $berita->delete();
        return back()->with('success', 'Berita berhasil dihapus.');
    }
}
