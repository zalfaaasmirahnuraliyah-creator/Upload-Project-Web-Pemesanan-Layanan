<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('layanans.index', compact('layanans'));
    }

    public function create()
    {
        return view('layanans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_layanan' => 'required',
            'harga' => 'required|numeric',
            'deskripsi' => 'nullable',
        ]);

        Layanan::create($request->all());
        return redirect()->route('layanans.index')->with('success', 'Layanan berhasil ditambahkan!');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect()->route('layanans.index')->with('success', 'Layanan berhasil dihapus!');
    }
}