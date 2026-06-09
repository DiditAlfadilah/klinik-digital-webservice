<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PatientModel extends Model
{
    protected $table = 'patients';

    protected $fillable = [
        'nik',
        'name',
        'gender',
        'birth_date',
        'address',
        'phone'
    ];
}