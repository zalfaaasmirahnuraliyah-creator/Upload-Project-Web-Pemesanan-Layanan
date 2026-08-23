**APLIKASI PEMESANAN LAYANAN — SELEKSI TEFA RPL SMKN 1 KATAPANG**

Sistem informasi berbasis Web untuk manajemen pemesanan layanan, pengolahan data pelanggan, serta pemantauan status transaksi secara real-time.

**Fitur Utama**
* **Sistem CRUD Lengkap:** Pengolahan data Layanan, Pelanggan, dan Pemesanan.
* **Manajemen Status Pemesanan:** Pelacakan status transaksi secara terstruktur.
* **Pencarian & Filter:** Pencarian data interaktif pada tabel utama.
* **Dashboard Ringkasan:** Ringkasan statistik transaksi dan layanan populer.

**Tech Stack**
* **Framework:** Laravel
* **Database:** MySQL
* **Templating:** Blade Engine
* **Styling:** Tailwind CSS

**Time Schedule (Linimasa Pengerjaan)**
Berikut adalah estimasi tahapan pengerjaan proyek berdasarkan siklus pengembangan perangkat lunak (SDLC):

| No | Fase SDLC | Aktivitas Utama | Estimasi Waktu |
| :--- | :--- | :--- | :--- |
| 1 | **Analisis & Kebutuhan** | Menganalisis studi kasus, menentukan fitur minimum, dan batasan sistem. | Hari ke-1 |
| 2 | **Perencanaan (Planning)** | Menyusun *Time Schedule*, arsitektur project, dan rancangan teknologi. | Hari ke-1 |
| 3 | **Perancangan (Design)** | Membuat skema database, tabel relasi, dan ERD sistem pemesanan. | Hari ke-2 |
| 4 | **Development (Coding)** | Implementasi migration database, model, controller, serta Blade & Tailwind. | Hari ke-2 s.d. Hari ke-3 |
| 5 | **Testing & Debugging** | Pengujian fungsionalitas CRUD, transaksi, filter, dan perbaikan *bug*. | Hari ke-4 |
| 6 | **Build & Deployment** | Finalisasi project, merapikan struktur folder, dan *push* repository ke GitHub. | Hari ke-4 |

**ERD & Rancangan Struktur Database**

Sistem ini menggunakan database **MySQL** dengan relasi antar tabel sebagai berikut:

```mermaid
erDiagram
    CUSTOMERS ||--o{ ORDERS : "makes"
    SERVICES ||--o{ ORDERS : "included_in"

    CUSTOMERS {
        int id PK
        string name
        string phone
        text address
        timestamp created_at
    }

    SERVICES {
        int id PK
        string name
        text description
        decimal price
        timestamp created_at
    }

    ORDERS {
        int id PK
        int customer_id FK
        int service_id FK
        date order_date
        string status
        decimal total_price
        timestamp created_at
    }
Flowchart Sistem Pemesanan

Cuplikan kode
flowchart TD
    %% Styling warna latar belakang putih & garis hitam
    classDef white fill:#ffffff,stroke:#333333,stroke-width:1.5px,color:#000000;

    A([Mulai - Buka Web]) --> B[Halaman Utama / Dashboard]
    B --> C{Pilih Menu}
    
    C -->|Kelola Layanan| D[Halaman Layanan - CRUD]
    C -->|Kelola Pelanggan| E[Halaman Pelanggan - CRUD]
    C -->|Transaksi Pemesanan| F[Halaman Pemesanan]

    F --> G[Input / Tambah Pemesanan Baru]
    G --> H[Pilih Pelanggan & Jenis Layanan]
    H --> I[Sistem Hitung Total Harga Otomatis]
    I --> J[Simpan Transaksi ke Database]
    
    J --> K[Update Status Pemesanan: Pending / Diproses / Selesai]
    K --> L([Selesai / Tampil Ringkasan Laporan])

    %% Terapkan style putih ke semua elemen
    class A,B,C,D,E,F,G,H,I,J,K,L white;
Arsitektur Komponen Blade & Styling Tailwind CSS

Sistem UI dibangun secara modular menggunakan fitur Blade Component & Layouts bawaan Laravel serta Tailwind CSS untuk konsistensi tampilan:

Base Layout (resources/views/layouts/app.blade.php): Menyediakan struktur HTML utama, header, sidebar navigasi, tempat penampung skrip Tailwind, dan area @yield('content').

Components (resources/views/components/):

navbar.blade.php — Bilah navigasi atas dengan pencarian cepat.

sidebar.blade.php — Menu navigasi utama (Dashboard, Layanan, Pelanggan, Transaksi).

card-stat.blade.php — Komponen kartu ringkasan statistik pada Dashboard.

table.blade.php — Komponen tabel interaktif reusable dengan badge status Tailwind.

Views Utama (resources/views/pages/):

dashboard.blade.php — Ringkasan total transaksi dan layanan terlaris.

services/index.blade.php — Form dan tabel kelola data layanan.

customers/index.blade.php — Form dan tabel kelola data pelanggan.

orders/index.blade.php — Form transaksi pemesanan dan pembaruan status.
