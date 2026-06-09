<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduleModel extends Model
{
    protected $table = 'schedules';

    protected $fillable = [
        'doctor_id',
        'day',
        'start_time',
        'end_time'
    ];
}