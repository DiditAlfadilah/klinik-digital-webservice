<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    protected $table = 'city';

    protected $fillable = [
        'province_id',
        'code',
        'name'
    ];
}