<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kontak;

class KontakController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string',
        ]);

        Kontak::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return back()->with('success', 'Pesan anda telah terkirim. Terima kasih!');
    }

    public function index()
    {
        $kontaks = Kontak::latest()->paginate(10);
        return view('admin.kontak.index', compact('kontaks'));
    }

    public function show($id)
    {
        $kontak = Kontak::findOrFail($id);
        return view('admin.kontak.show', compact('kontak'));
    }
}
