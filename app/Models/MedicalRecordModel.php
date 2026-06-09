<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalRecordModel extends Model
{
    protected $table = 'medical_records';

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'appointment_id',
        'complaint',
        'diagnosis',
        'treatment'
    ];
}