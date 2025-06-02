<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Kontak;

class KontakController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'message' => 'required|string|min:5',
        ]);

        Kontak::create($validated);

        return back()->with('success', 'Pesan anda telah terkirim. Terima kasih!');
    }
}
