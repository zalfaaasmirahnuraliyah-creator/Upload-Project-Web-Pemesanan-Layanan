# Sistem Pemesanan Layanan (Web Project) - TeFa RPL SMKN 1 Katapang

Repository ini berisi source code proyek Web Development untuk Seleksi Produksi Teaching Factory (TeFa) Kompetensi Keahlian Rekayasa Perangkat Lunak (RPL) SMKN 1 Katapang.

---

## 1. Time Schedule (Linimasa Pengerjaan)
Berikut adalah estimasi tahapan pengerjaan proyek berdasarkan siklus pengembangan perangkat lunak (SDLC):

| No | Fase SDLC | Aktivitas Utama | Estimasi Waktu |
| :--- | :--- | :--- | :--- |
| 1 | **Analisis & Kebutuhan** | Menganalisis studi kasus, menentukan fitur minimum, dan batasan sistem. | Hari ke-1 |
| 2 | **Perencanaan (Planning)** | Menyusun *Time Schedule*, arsitektur project, dan rancangan teknologi (Laravel, MySQL, Tailwind). | Hari ke-1 |
| 3 | **Perancangan (Design)** | Membuat skema database, tabel relasi, dan ERD sistem pemesanan. | Hari ke-2 |
| 4 | **Development (Coding)** | Implementasi migration database, model, controller, serta tampilan Blade & Tailwind CSS. | Hari ke-2 s.d. Hari ke-3 |
| 5 | **Testing & Debugging** | Pengujian fungsionalitas CRUD, transaksi pemesanan, filter, dan perbaikan *error/bug*. | Hari ke-4 |
| 6 | **Build & Deployment** | Finalisasi project, merapikan struktur folder, dan *push* repository ke GitHub. | Hari ke-4 |

---

## 2. ERD & Rancangan Struktur Database
Sistem Pemesanan Layanan ini menggunakan database **MySQL** dengan beberapa tabel utama yang saling berelasi.

### Skema Relasi Antar Tabel (ERD Concept)
* **Tabel `services` (Layanan)** berelasi 1 ke Banyak (1:N) dengan **Tabel `orders` (Pemesanan)**
* **Tabel `customers` (Pelanggan)** berelasi 1 ke Banyak (1:N) dengan **Tabel `orders` (Pemesanan)**

---

## 3. Struktur Tabel dan Value (Kolom)

### A. Tabel `services` (Data Layanan)
Menyimpan informasi jenis layanan yang ditawarkan kepada pelanggan.
* `id` (INT, Primary Key, Auto Increment)
* `name` (VARCHAR) - Nama layanan (contoh: Cuci Sepatu, Reparasi Tas, dll.)
* `description` (TEXT) - Deskripsi detail layanan
* `price` (DECIMAL) - Harga layanan
* `created_at` / `updated_at` (TIMESTAMP)

### B. Tabel `customers` (Data Pelanggan)
Menyimpan informasi data profil pelanggan yang memesan.
* `id` (INT, Primary Key, Auto Increment)
* `name` (VARCHAR) - Nama lengkap pelanggan
* `phone` (VARCHAR) - Nomor telepon / WhatsApp
* `address` (TEXT) - Alamat pelanggan
* `created_at` / `updated_at` (TIMESTAMP)

### C. Tabel `orders` (Transaksi Pemesanan)
Menyimpan data transaksi pemesanan layanan yang dilakukan pelanggan.
* `id` (INT, Primary Key, Auto Increment)
* `customer_id` (INT, Foreign Key ke tabel `customers`)
* `service_id` (INT, Foreign Key ke tabel `services`)
* `order_date` (DATE) - Tanggal pemesanan dibuat
* `status` (VARCHAR) - Status progres (Contoh: *Pending*, *Diproses*, *Selesai*)
* `total_price` (DECIMAL) - Total biaya
* `created_at` / `updated_at` (TIMESTAMP)

---

## 4. Tech Stack
* **Framework:** Laravel
* **Database:** MySQL
* **Template Engine:** Blade
* **CSS Framework:** Tailwind CSS

## 5. Cara Menjalankan Project
1. Clone repository ini ke komputer lokal:
   ```bash
   git clone [https://github.com/zalfaaasmirahnuraliyah-creator/Upload-Project-Web-Pemesanan-Layanan.git](https://github.com/zalfaaasmirahnuraliyah-creator/Upload-Project-Web-Pemesanan-Layanan.git)
