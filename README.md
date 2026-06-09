# 🏥 Klinik Digital Web Service

REST API Klinik Digital menggunakan Laravel 12, MySQL, dan JWT Authentication untuk mengelola data pasien, dokter, jadwal praktik, janji temu, serta rekam medis.

---

## 📌 Deskripsi Proyek

Klinik Digital Web Service merupakan layanan backend berbasis REST API yang digunakan untuk mendukung sistem informasi klinik.

API ini menyediakan fitur:

* Authentication Login JWT
* Manajemen Pasien
* Manajemen Dokter
* Manajemen Jadwal Praktik
* Manajemen Appointment (Janji Temu)
* Manajemen Medical Record (Rekam Medis)
* Log Aktivitas API

---

## 👨‍💻 Developer

**Nama:** Didit Alfadilah

**Program Studi:** Teknik Informatika

**Universitas:** Universitas Bumi Gora

---

## 🛠️ Teknologi Yang Digunakan

* Laravel 12
* PHP 8+
* MySQL
* JWT Authentication
* Composer
* Postman
* Git & GitHub

---

# 📊 Entity Relationship Diagram (ERD)

## Tabel Utama

### Patients

| Field   | Type    |
| ------- | ------- |
| id      | bigint  |
| nik     | varchar |
| name    | varchar |
| gender  | varchar |
| phone   | varchar |
| address | text    |

---

### Doctors

| Field      | Type    |
| ---------- | ------- |
| id         | bigint  |
| name       | varchar |
| specialist | varchar |
| phone      | varchar |
| email      | varchar |

---

### Schedules

| Field      | Type    |
| ---------- | ------- |
| id         | bigint  |
| doctor_id  | bigint  |
| day        | varchar |
| start_time | time    |
| end_time   | time    |

---

### Appointments

| Field            | Type   |
| ---------------- | ------ |
| id               | bigint |
| patient_id       | bigint |
| doctor_id        | bigint |
| schedule_id      | bigint |
| appointment_date | date   |
| status           | enum   |

---

### Medical Records

| Field          | Type   |
| -------------- | ------ |
| id             | bigint |
| patient_id     | bigint |
| doctor_id      | bigint |
| appointment_id | bigint |
| complaint      | text   |
| diagnosis      | text   |
| treatment      | text   |

---

### Log Activity

| Field         | Type     |
| ------------- | -------- |
| id            | bigint   |
| method        | varchar  |
| endpoint      | varchar  |
| request_data  | longtext |
| response_data | longtext |
| status        | integer  |

---

# 🔐 Authentication
https://documenter.getpostman.com/view/44593768/2sBXwqsBD7
---

# 📈 API Log Activity

Mencatat seluruh aktivitas API secara otomatis:

* Login
* Logout
* Create Data
* Update Data
* Delete Data
* Error Response
* Unauthorized Access

---

# 🚀 Cara Menjalankan Project

## Clone Repository

```bash
git clone https://github.com/DiditAlfadilah/klinik-digital-webservice.git
```

## Masuk Ke Folder

```bash
cd klinik-digital-webservice
```

## Install Dependency

```bash
composer install
```

## Copy Environment

```bash
cp .env.example .env
```

## Generate Key

```bash
php artisan key:generate
```

## Generate JWT Secret

```bash
php artisan jwt:secret
```

## Migrasi Database

```bash
php artisan migrate
```

## Jalankan Server

```bash
php artisan serve
```

---

# 📬 Testing API

Gunakan Postman untuk melakukan pengujian endpoint API.

Pastikan token JWT sudah ditambahkan pada Authorization Header:

```text
Bearer <token>
```

---

# 📄 Lisensi

Project ini dibuat untuk memenuhi tugas UAS Mata Kuliah Web Service.
