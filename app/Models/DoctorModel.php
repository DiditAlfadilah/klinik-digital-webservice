<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoctorModel extends Model
{
    protected $table = 'doctors';

    protected $fillable = [
        'name',
        'specialist',
        'phone',
        'email'
    ];
}