<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pemesanan Layanan SMKN 1 Katapang</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen">

    <!-- NAVBAR TERPISAH -->
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-6xl mx-auto px-6 py-4 flex items-center justify-between">
            <div class="font-bold text-lg text-slate-800">
                Sistem Pemesanan Layanan <span class="text-blue-600 text-sm font-normal ml-1">SMKN 1 Katapang</span>
            </div>
            <div class="flex space-x-6 text-sm font-medium">
                <a href="/layanans" class="text-gray-500 hover:text-blue-600 pb-1 transition">Daftar Layanan</a>
                <a href="/pelanggans" class="text-blue-600 border-b-2 border-blue-600 pb-1">Data Pelanggan</a>
                <a href="/pemesanans" class="text-gray-500 hover:text-blue-600 pb-1 transition">Data Pemesanan</a>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA -->
    <main class="max-w-6xl mx-auto px-6 py-8">
        <div class="bg-white rounded-xl shadow-md p-6 border border-gray-100">
            
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h1 class="text-2xl font-bold text-slate-800">Data Pelanggan</h1>
                    <p class="text-sm text-gray-500">Sistem Pemesanan Layanan SMKN 1 Katapang</p>
                </div>
                <a href="/pelanggans/create" class="bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium px-4 py-2 rounded-lg transition inline-block">
                    + Tambah Pelanggan
                </a>
            </div>

            <!-- TABEL DATA PELANGGAN -->
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm">
                    <thead>
                        <tr class="bg-gray-50 text-gray-600 font-semibold border-b">
                            <th class="py-3 px-4">No</th>
                            <th class="py-3 px-4">Nama Pelanggan</th>
                            <th class="py-3 px-4">No. Telepon / Email</th>
                            <th class="py-3 px-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 text-gray-700">
                        @foreach ($pelanggans as $index => $pelanggan)
                            <tr class="hover:bg-gray-50">
                                <td class="py-3 px-4">{{ $index + 1 }}</td>
                                <td class="py-3 px-4 font-medium text-gray-900">{{ $pelanggan->nama_pelanggan }}</td>
                                <td class="py-3 px-4 text-gray-500">{{ $pelanggan->kontak ?? '-' }}</td>
                                <td class="py-3 px-4 text-center">
                                    <form action="{{ route('pelanggans.destroy', $pelanggan->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 font-medium" onclick="return confirm('Yakin hapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </main>

</body>
</html>