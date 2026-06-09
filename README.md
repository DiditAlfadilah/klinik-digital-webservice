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

## Login

### Endpoint

```http
POST /api/login
```

### Request

```json
{
    "email": "fadididit@gmail.com",
    "password": "170721"
}
```

### Response

```json
{
    "token": "jwt_token"
}
```

---

# 👨‍⚕️ Doctor API

## Get All Doctors

```http
GET /api/doctor
```

## Create Doctor

```http
POST /api/doctor
```

```json
{
    "name": "Dr. Budi Santoso",
    "specialist": "Dokter Umum",
    "phone": "08123456789",
    "email": "budi@gmail.com"
}
```

---

# 🧑 Patient API

## Get All Patients

```http
GET /api/patient
```

## Create Patient

```http
POST /api/patient
```

```json
{
    "nik": "5201010101010001",
    "name": "Didit Alfadilah",
    "gender": "L",
    "phone": "081234567890",
    "address": "Mataram"
}
```

---

# 📅 Schedule API

## Get All Schedules

```http
GET /api/schedule
```

## Create Schedule

```http
POST /api/schedule
```

```json
{
    "doctor_id": 1,
    "day": "Senin",
    "start_time": "08:00:00",
    "end_time": "12:00:00"
}
```

---

# 📋 Appointment API

## Get All Appointments

```http
GET /api/appointment
```

## Create Appointment

```http
POST /api/appointment
```

```json
{
    "patient_id": 1,
    "doctor_id": 1,
    "schedule_id": 1,
    "appointment_date": "2026-06-22",
    "status": "pending"
}
```

---

# 🩺 Medical Record API

## Get All Medical Records

```http
GET /api/medical-record
```

## Create Medical Record

```http
POST /api/medical-record
```

```json
{
    "patient_id": 1,
    "doctor_id": 1,
    "appointment_id": 1,
    "complaint": "Sakit Kepala",
    "diagnosis": "Influenza",
    "treatment": "Paracetamol 3x sehari"
}
```

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
