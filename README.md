# Aplikasi Pemesanan Layanan - Seleksi TeFa RPL SMKN 1 Katapang
Sistem informasi berbasis Web untuk manajemen pemesanan layanan, pengolahan data pelanggan, serta pemantauan status transaksi secara real-time.

## Fitur Utama
* **Sistem CRUD Lengkap:** Pengolahan data Layanan, Pelanggan, dan Pemesanan.
* **Manajemen Status Pemesanan:** Pelacakan status transaksi secara terstruktur.
* **Pencarian & Filter:** Pencarian data interaktif pada tabel utama.
* **Dashboard Ringkasan:** Ringkasan statistik transaksi dan layanan populer.

## Tech Stack
* **Framework:** Laravel
* **Database:** MySQL
* **Templating:** Blade Engine
* **Styling:** Tailwind CSS

---

## Time Schedule (Linimasa Pengerjaan)
Berikut adalah estimasi tahapan pengerjaan proyek berdasarkan siklus pengembangan perangkat lunak (SDLC):

| No | Fase SDLC | Aktivitas Utama | Estimasi Waktu |
| :--- | :--- | :--- | :--- |
| 1 | **Analisis & Kebutuhan** | Menganalisis studi kasus, menentukan fitur minimum, dan batasan sistem. | Hari ke-1 |
| 2 | **Perencanaan (Planning)** | Menyusun *Time Schedule*, arsitektur project, dan rancangan teknologi. | Hari ke-1 |
| 3 | **Perancangan (Design)** | Membuat skema database, tabel relasi, dan ERD sistem pemesanan. | Hari ke-2 |
| 4 | **Development (Coding)** | Implementasi migration database, model, controller, serta Blade & Tailwind. | Hari ke-2 s.d. Hari ke-3 |
| 5 | **Testing & Debugging** | Pengujian fungsionalitas CRUD, transaksi, filter, dan perbaikan *bug*. | Hari ke-4 |
| 6 | **Build & Deployment** | Finalisasi project, merapikan struktur folder, dan *push* repository ke GitHub. | Hari ke-4 |

---

## ERD & Rancangan Struktur Database
Sistem ini menggunakan database **MySQL** dengan relasi antar tabel sebagai berikut:
* **Tabel `services` (Layanan)** berelasi 1 ke Banyak (1:N) dengan **Tabel `orders` (Pemesanan)**
* **Tabel `customers` (Pelanggan)** berelasi 1 ke Banyak (1:N) dengan **Tabel `orders` (Pemesanan)**

### Diagram ERD (Entity Relationship Diagram)
*(Kamu bisa upload gambar hasil export Draw.io ke repository GitHub, lalu ganti link di bawah ini dengan link gambar kamu)*
![Diagram ERD Sistem](./path-to-your-erd-image.png)

### Struktur Kolom Utama:
1. **`services`**: `id`, `name`, `description`, `price`, `timestamps`
2. **`customers`**: `id`, `name`, `phone`, `address`, `timestamps`
3. **`orders`**: `id`, `customer_id`, `service_id`, `order_date`, `status`, `total_price`, `timestamps`

---

## Cara Menjalankan Project
1. Clone repository ini:
   ```bash
   git clone <url-repository-kamu>
