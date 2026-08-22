<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pemesanan Layanan - TeFa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 font-sans p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-md">
        
        <!-- Navigation Menu -->
        <div class="flex space-x-4 border-b pb-4 mb-6 text-sm font-medium">
            <a href="{{ route('layanans.index') }}" class="text-blue-600 font-bold border-b-2 border-blue-600 pb-4 -mb-4">Daftar Layanan</a>
            <a href="{{ route('pelanggans.index') }}" class="text-slate-500 hover:text-blue-600">Data Pelanggan</a>
            <a href="{{ route('pemesanans.index') }}" class="text-slate-500 hover:text-blue-600">Data Pemesanan</a>
        </div>

        <div class="flex justify-between items-center mb-6">
            <div>
                <h1 class="text-2xl font-bold text-slate-800">Daftar Layanan</h1>
                <p class="text-slate-500 text-sm">Sistem Pemesanan Layanan SMKN 1 Katapang</p>
            </div>
            <a href="{{ route('layanans.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium">
                + Tambah Layanan
            </a>
        </div>

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
                        <th class="p-3">Nama Layanan</th>
                        <th class="p-3">Harga</th>
                        <th class="p-3">Deskripsi</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm text-slate-700">
                    @forelse ($layanans as $index => $item)
                        <tr class="hover:bg-slate-50">
                            <td class="p-3">{{ $index + 1 }}</td>
                            <td class="p-3 font-semibold">{{ $item->nama_layanan }}</td>
                            <td class="p-3 text-green-600 font-medium">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                            <td class="p-3">{{ $item->deskripsi ?? '-' }}</td>
                            <td class="p-3 text-center">
                                <form action="{{ route('layanans.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-4 text-center text-slate-400">Belum ada data layanan. Klik "+ Tambah Layanan" di atas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>