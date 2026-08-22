<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pemesanan - TeFa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 font-sans p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-md">
        
        <!-- Navigation Menu -->
        <div class="flex space-x-4 border-b pb-4 mb-6 text-sm font-medium">
            <a href="{{ route('layanans.index') }}" class="text-slate-500 hover:text-blue-600">Daftar Layanan</a>
            <a href="{{ route('pelanggans.index') }}" class="text-slate-500 hover:text-blue-600">Data Pelanggan</a>
            <a href="{{ route('pemesanans.index') }}" class="text-blue-600 font-bold border-b-2 border-blue-600 pb-4 -mb-4">Data Pemesanan</a>
        </div>

        <!-- Ringkasan Informasi / Dashboard Singkat -->
        <div class="grid grid-cols-3 gap-4 mb-6">
            <div class="bg-blue-50 p-4 rounded-lg border border-blue-100">
                <p class="text-xs text-blue-600 font-medium">Total Pesanan</p>
                <p class="text-2xl font-bold text-blue-800">{{ $totalPesanan }}</p>
            </div>
            <div class="bg-yellow-50 p-4 rounded-lg border border-yellow-100">
                <p class="text-xs text-yellow-600 font-medium">Pesanan Pending</p>
                <p class="text-2xl font-bold text-yellow-800">{{ $totalPending }}</p>
            </div>
            <div class="bg-green-50 p-4 rounded-lg border border-green-100">
                <p class="text-xs text-green-600 font-medium">Pesanan Selesai</p>
                <p class="text-2xl font-bold text-green-800">{{ $totalSelesai }}</p>
            </div>
        </div>

        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Transaksi Pemesanan</h1>
                <p class="text-slate-500 text-sm">Riwayat dan kelola pesanan layanan</p>
            </div>
            <a href="{{ route('pemesanans.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                + Buat Pesanan Baru
            </a>
        </div>

        <!-- Filter / Pencarian -->
        <form method="GET" action="{{ route('pemesanans.index') }}" class="mb-4">
            <div class="flex gap-2">
                <input type="text" name="search" value="{{ $search }}" placeholder="Cari nama pelanggan / layanan..." class="w-full px-3 py-2 border border-slate-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit" class="bg-slate-700 hover:bg-slate-800 text-white px-4 py-2 rounded-lg text-sm">Cari</button>
            </div>
        </form>

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4 text-sm">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 border-b border-slate-200 text-slate-600 text-sm">
                        <th class="p-3">No</th>
                        <th class="p-3">Pelanggan</th>
                        <th class="p-3">Layanan</th>
                        <th class="p-3">Tgl Pesan</th>
                        <th class="p-3">Status</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                    @forelse ($pemesanans as $index => $item)
                        <tr class="hover:bg-slate-50">
                            <td class="p-3">{{ $index + 1 }}</td>
                            <td class="p-3 font-semibold">{{ $item->pelanggan->nama ?? 'Dihapus' }}</td>
                            <td class="p-3">{{ $item->layanan->nama_layanan ?? 'Dihapus' }}</td>
                            <td class="p-3">{{ $item->created_at->format('Y-m-d') }}</td>
                            <td class="p-3">
                                <!-- Form Toggle Status -->
                                <form action="{{ route('pemesanans.updateStatus', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" onchange="this.form.submit()" class="text-xs px-2 py-1 rounded font-semibold border-0 {{ $item->status == 'Selesai' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                        <option value="Pending" {{ $item->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="Selesai" {{ $item->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </form>
                            </td>
                            <td class="p-3 text-center">
                                <form action="{{ route('pemesanans.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin hapus transaksi ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="p-4 text-center text-slate-400">Data pemesanan tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>