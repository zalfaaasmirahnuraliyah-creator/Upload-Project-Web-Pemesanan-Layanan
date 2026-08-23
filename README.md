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

## ERD & Rancangan Struktur Database
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
