# 🏥 Klinik Digital Web Service

Sistem Web Service Klinik Digital berbasis Laravel REST API yang digunakan untuk mengelola data pasien, dokter, jadwal praktik, janji temu (appointment), dan rekam medis secara terintegrasi.

---

## 👨‍💻 Identitas Mahasiswa

* Nama : Didit Alfadilah
* Nim : 2301040010
* Mata Kuliah : Web Service
* Prodi : Rekayasa Perangkat Lunak (RPL)
* Program Studi : S1
* Universitas : Universitas Bumigora

---

## 📖 Deskripsi Proyek

Klinik Digital Web Service merupakan layanan backend berbasiss REST API yang digunakan untuk mendukung sistem informasi klinik digital.
Webb service inimenyediakann fitur:

* Login Authentication (JWT)
* Manajemen Data Pasien
* Manajemen Data Dokter
* Manajemen Jadwa Dokterr
* Manajemen Appointment
* Manajemen Rekam Medis
* Logging Aktivitas API

---

## 🚀 Teknologi yang Digunakan

### Backend

* Laravel 12
* PHP 8+
* JWT Authentication

### Database

* MySQL

### API Testing

* Postman

### Version Control

* Git
* GitHub

---

## 🗄️ Struktur Database

### Tabel Utama

#### users

Menyimpan data akun pengguna.

#### patients

Menyimpan data pasien.

#### doctors

Menyimpan data dokter.

#### schedules

Menyimpan jadwal praktik dokter.

#### appointments

Menyimpan data janji temu pasien.

#### medical_records

Menyimpan rekam medis pasien.

#### log

Menyimpan seluruh aktivitas API.

---

## 📊 Relasi Database

Patient (1) ---- (M) Appointment

Doctor (1) ---- (M) Appointment

Doctor (1) ---- (M) Schedule

Appointment (1) ---- (1) Medical Record

Patient (1) ---- (M) Medical Record

Doctor (1) ---- (M) Medical Record

---

## 🔐 Authentication

API menggunakan JWT Authentication.

### Login

POST /api/login

Request:

{
"email":"[fadididit@gmail.com](mailto:fadididit@gmail.com)",
"password":"170721"
}

Response:

{
"token":"JWT_TOKEN"
}

Gunakan token pada Header:

Authorization: Bearer TOKEN

---

## 📋 Endpoint API

### Province

| Method | Endpoint           |
| ------ | ------------------ |
| GET    | /api/province      |
| POST   | /api/province      |
| PUT    | /api/province/{id} |
| DELETE | /api/province/{id} |

---

### City

| Method | Endpoint                |
| ------ | ----------------------- |
| GET    | /api/city               |
| POST   | /api/city               |
| GET    | /api/city/province/{id} |
| PUT    | /api/city/{id}          |
| DELETE | /api/city/{id}          |

---

### District

| Method | Endpoint                |
| ------ | ----------------------- |
| GET    | /api/district           |
| POST   | /api/district           |
| GET    | /api/district/city/{id} |
| PUT    | /api/district/{id}      |
| DELETE | /api/district/{id}      |

---

### Patient

| Method | Endpoint          |
| ------ | ----------------- |
| GET    | /api/patient      |
| POST   | /api/patient      |
| GET    | /api/patient/{id} |
| PUT    | /api/patient/{id} |
| DELETE | /api/patient/{id} |

---

### Doctor

| Method | Endpoint         |
| ------ | ---------------- |
| GET    | /api/doctor      |
| POST   | /api/doctor      |
| GET    | /api/doctor/{id} |
| PUT    | /api/doctor/{id} |
| DELETE | /api/doctor/{id} |

---

### Schedule

| Method | Endpoint                  |
| ------ | ------------------------- |
| GET    | /api/schedule             |
| POST   | /api/schedule             |
| GET    | /api/schedule/doctor/{id} |
| PUT    | /api/schedule/{id}        |
| DELETE | /api/schedule/{id}        |

---

### Appointment

| Method | Endpoint                      |
| ------ | ----------------------------- |
| GET    | /api/appointment              |
| POST   | /api/appointment              |
| GET    | /api/appointment/patient/{id} |
| PUT    | /api/appointment/{id}         |
| DELETE | /api/appointment/{id}         |

---

### Medical Record

| Method | Endpoint                         |
| ------ | -------------------------------- |
| GET    | /api/medical-record              |
| POST   | /api/medical-record              |
| GET    | /api/medical-record/patient/{id} |
| PUT    | /api/medical-record/{id}         |
| DELETE | /api/medical-record/{id}         |

---

## 📬 Dokumentasi Postman

Dokumentasi lengkap API dapat diakses melalui:

https://documenter.getpostman.com/view/44593768/2sBXwqsBD7

---

## 📝 Logging API

Setiap request API akan disimpan ke tabel log yang berisi:

* Method
* Endpoint
* Request Data
* Response Data
* Status Code
* Timestamp

Contoh:

POST /api/login → 200

GET /api/province → 200

POST /api/appointment → 200

GET /api/tes → 404

---

## ⚙️ Cara Menjalankan Project

Clone Repository

git clone https://github.com/DiditAlfadilah/klinik-digital-webservice.git

Masuk ke folder project

cd klinik-digital-webservice

Install dependency

composer install

Copy file environment

cp .env.example .env

Generate key

php artisan key:generate

Migrasi database

php artisan migrate

Jalankan server

php artisan serve

---

## 📌 Repository GitHub

https://github.com/DiditAlfadilah/klinik-digital-webservice

---

## 🎯 Status Project

✅ Authentication JWT

✅ Province API

✅ City API

✅ District API

✅ Patient API

✅ Doctor API

✅ Schedule API

✅ Appointment API

✅ Medical Record API

✅ Logging API

---

## 📄 Lisensi

Project ini dibuat untuk memenuhi tugas UAS Mata Kuliah Pemrograman Web Service.
