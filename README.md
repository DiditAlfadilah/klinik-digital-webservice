# Klinik Digital Web Service

REST API untuk sistem manajemen klinik digital yang dibangun menggunakan Laravel dan MySQL.

## Deskripsi Proyek

Klinik Digital Web Service adalah layanan REST API yang digunakan untuk mengelola data pasien, dokter, jadwal praktik, janji temu (appointment), rekam medis, serta aktivitas sistem.

Proyek ini dibuat untuk memenuhi tugas UAS Mata Kuliah Web Service.

## Teknologi yang Digunakan

* Laravel 12
* PHP 8+
* MySQL
* JWT Authentication
* Postman
* Git & GitHub

## Fitur Utama

### Authentication

* Login
* Logout
* Refresh Token
* Get Current User

### Master Data

* Province
* City
* District

### Klinik Digital

* Patient Management
* Doctor Management
* Schedule Management
* Appointment Management
* Medical Record Management

### Monitoring

* Activity Log API

## Struktur Database

### Patients

* id
* nik
* name
* gender
* birth_date
* address

### Doctors

* id
* name
* specialist
* phone
* email

### Schedules

* id
* doctor_id
* day
* start_time
* end_time

### Appointments

* id
* patient_id
* doctor_id
* schedule_id
* appointment_date
* status

### Medical Records

* id
* patient_id
* doctor_id
* appointment_id
* complaint
* diagnosis
* treatment

### Logs

* id
* method
* endpoint
* request_data
* response_data
* status

## API Endpoints

### Authentication

| Method | Endpoint     |
| ------ | ------------ |
| POST   | /api/login   |
| GET    | /api/logout  |
| GET    | /api/me      |
| GET    | /api/refresh |

### Province

| Method | Endpoint           |
| ------ | ------------------ |
| GET    | /api/province      |
| POST   | /api/province      |
| GET    | /api/province/{id} |
| PUT    | /api/province/{id} |
| DELETE | /api/province/{id} |

### City

| Method | Endpoint       |
| ------ | -------------- |
| GET    | /api/city      |
| POST   | /api/city      |
| GET    | /api/city/{id} |
| PUT    | /api/city/{id} |
| DELETE | /api/city/{id} |

### District

| Method | Endpoint           |
| ------ | ------------------ |
| GET    | /api/district      |
| POST   | /api/district      |
| GET    | /api/district/{id} |
| PUT    | /api/district/{id} |
| DELETE | /api/district/{id} |

### Patient

| Method | Endpoint          |
| ------ | ----------------- |
| GET    | /api/patient      |
| POST   | /api/patient      |
| GET    | /api/patient/{id} |
| PUT    | /api/patient/{id} |
| DELETE | /api/patient/{id} |

### Doctor

| Method | Endpoint         |
| ------ | ---------------- |
| GET    | /api/doctor      |
| POST   | /api/doctor      |
| GET    | /api/doctor/{id} |
| PUT    | /api/doctor/{id} |
| DELETE | /api/doctor/{id} |

### Schedule

| Method | Endpoint           |
| ------ | ------------------ |
| GET    | /api/schedule      |
| POST   | /api/schedule      |
| GET    | /api/schedule/{id} |
| PUT    | /api/schedule/{id} |
| DELETE | /api/schedule/{id} |

### Appointment

| Method | Endpoint              |
| ------ | --------------------- |
| GET    | /api/appointment      |
| POST   | /api/appointment      |
| GET    | /api/appointment/{id} |
| PUT    | /api/appointment/{id} |
| DELETE | /api/appointment/{id} |

### Medical Record

| Method | Endpoint                 |
| ------ | ------------------------ |
| GET    | /api/medical-record      |
| POST   | /api/medical-record      |
| GET    | /api/medical-record/{id} |
| PUT    | /api/medical-record/{id} |
| DELETE | /api/medical-record/{id} |

## Instalasi

Clone repository:

```bash
git clone https://github.com/DiditAlfadilah/klinik-digital-webservice.git
```

Masuk ke folder project:

```bash
cd klinik-digital-webservice
```

Install dependency:

```bash
composer install
```

Copy file environment:

```bash
cp .env.example .env
```

Generate key:

```bash
php artisan key:generate
```

Konfigurasi database pada file .env

Jalankan migrasi:

```bash
php artisan migrate
```

Jalankan server:

```bash
php artisan serve
```

## Pengembang

Nama : Didit Alfadilah

Program Studi : Teknik Informatika

Universitas : Universitas Bumigora

Tahun : 2026

## Lisensi

Project ini dibuat untuk keperluan akademik dan pembelajaran.
