<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pelanggan Baru</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 font-sans p-8">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-xl shadow-md">
        <h1 class="text-xl font-bold text-slate-800 mb-4">Tambah Pelanggan Baru</h1>

        <form action="{{ route('pelanggans.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Nama Lengkap</label>
                <input type="text" name="nama" required class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">No. WhatsApp / HP</label>
                <input type="text" name="no_hp" required class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
            </div>

            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Alamat</label>
                <textarea name="alamat" rows="3" required class="w-full border border-slate-300 p-2 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"></textarea>
            </div>

            <div class="flex justify-end space-x-2 pt-2">
                <a href="{{ route('pelanggans.index') }}" class="px-4 py-2 border border-slate-300 rounded-lg text-slate-600 text-sm">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>