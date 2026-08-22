<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Pelanggan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $pemesanans = Pemesanan::with(['pelanggan', 'layanan'])
            ->when($search, function ($query, $search) {
                return $query->whereHas('pelanggan', function ($q) use ($search) {
                    $q->where('nama', 'like', "%{$search}%");
                })->orWhereHas('layanan', function ($q) use ($search) {
                    $q->where('nama_layanan', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->get();

        // Data untuk Ringkasan/Dashboard singkat
        $totalPesanan = Pemesanan::count();
        $totalPending = Pemesanan::where('status', 'Pending')->count();
        $totalSelesai = Pemesanan::where('status', 'Selesai')->count();

        return view('pemesanans.index', compact('pemesanans', 'totalPesanan', 'totalPending', 'totalSelesai', 'search'));
    }

    public function updateStatus(Request $request, $id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->status = $request->status;
        $pemesanan->save();

        return redirect()->back()->with('success', 'Status pemesanan berhasil diperbarui!');
    }

    // (Tetapkan method create, store, destroy kamu seperti sebelumnya)
}