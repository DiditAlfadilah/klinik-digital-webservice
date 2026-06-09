<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppointmentModel extends Model
{
    protected $table = 'appointments';

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'schedule_id',
        'appointment_date',
        'status'
    ];
}