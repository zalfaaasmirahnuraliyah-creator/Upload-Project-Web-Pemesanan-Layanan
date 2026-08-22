<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Pemesanan Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 font-sans p-8">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-xl font-bold text-slate-800 mb-4">Buat Pemesanan Baru</h1>

        <form action="{{ route('pemesanans.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Pilih Pelanggan</label>
                <select name="pelanggan_id" required class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">-- Pilih Pelanggan --</option>
                    @foreach($pelanggans as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }} ({{ $p->no_hp }})</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Pilih Layanan</label>
                <select name="layanan_id" required class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">-- Pilih Layanan --</option>
                    @foreach($layanans as $l)
                        <option value="{{ $l->id }}">{{ $l->nama_layanan }} - Rp {{ number_format($l->harga, 0, ',', '.') }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Tanggal Pesan</label>
                <input type="date" name="tanggal_pesan" value="{{ date('Y-m-d') }}" required class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div class="flex justify-end space-x-2 pt-2">
                <a href="{{ route('pemesanans.index') }}" class="px-4 py-2 border border-slate-300 rounded-lg text-slate-600 text-sm">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium">Buat Pesanan</button>
            </div>
        </form>
    </div>
</body>
</html>