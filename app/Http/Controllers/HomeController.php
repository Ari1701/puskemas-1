<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\Kontak;
use App\Models\Berita;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->middleware('auth')->except(['index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $beritas = Berita::latest()->take(3)->get();
        return view('home', compact('beritas'));
    }

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
