# TP10DPBO2025C2
Saya Muhammad Alfi Fariz dengan NIM 2311174 mengerjakan TP 10 dalam mata kuliah Desain Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

# Sistem Manajemen Bengkel Kendaraan (MVVM + PHP + PDO)

Proyek ini adalah aplikasi web sederhana dengan tema manajemen bengkel kendaraan yang dibangun dengan arsitektur **MVVM (Model-View-ViewModel)** menggunakan PHP Native. Aplikasi ini mendukung operasi **CRUD (Create, Read, Update, Delete)** pada tiga entitas utama: `mechanic`, `vehicle`, dan `service`.

---

## Struktur Tabel & Relasi

### 1. `mechanic`
- `id` (Primary Key)
- `name`
- `specialty`

### 2. `vehicle`
- `id` (Primary Key)
- `owner_name`
- `license_plate`
- `type`

### 3. `service`
- `id` (Primary Key)
- `vehicle_id` (Foreign Key → `vehicle.id`)
- `mechanic_id` (Foreign Key → `mechanic.id`)
- `service_date`
- `description`

**Relasi:**
- Satu `mechanic` bisa menangani banyak `service`.
- Satu `vehicle` bisa memiliki banyak histori `service`.

![image](https://github.com/user-attachments/assets/6e7fb930-1850-4fdf-8b8f-064282e03397)

---

## Fitur Aplikasi

- CRUD lengkap untuk `mechanic`, `vehicle`, dan `service`.
- Dropdown otomatis saat memilih kendaraan dan montir.
- Data binding otomatis di form edit.
- Prepared Statement untuk keamanan input user (menghindari SQL Injection).
- UI sederhana dan responsif menggunakan Bootstrap 5.

---

## Struktur Folder MVVM

```
/
│
├── config/
|    └── database.php           # Koneksi PDO 
├── database/
|    └── bengkel.php 
├── model/
│   ├── MechanicModel.php
│   ├── VehicleModel.php
│   └── ServiceModel.php
│
├── viewmodel/
│   ├── MechanicViewModel.php
│   ├── VehicleViewModel.php
│   └── ServiceViewModel.php
│
├── views/
│   └── template/
│       ├── footer.php
│       └── headerr.php
│   ├── mechanic_list.php
│   ├── mechanic_form.php
│   ├── vehicle_list.php
│   ├── vehicle_form.php
│   ├── service_list.php
│   ├── service_form.php
│
└── index.php     # entry point
```

---

## Alur Aplikasi

1. **User** mengakses `index.php` dengan parameter seperti `?entity=vehicle&action=add`.
2. **ViewModel** (misal: `VehicleViewModel`) akan:
   - Mengambil data dari **Model** (misalnya: list mechanic atau vehicle).
   - Meneruskan data ke file **View** (misalnya `vehicle_form.php`).
3. **View** akan menampilkan form atau tabel.
4. Jika ada input (`POST`), ViewModel akan meneruskan data ke **Model**.
5. **Model** akan melakukan query ke database menggunakan **PDO + prepared statement**.
6. Hasil akan direfresh atau diarahkan kembali ke halaman list.

---

## Dokumentasi ScreenRecord
