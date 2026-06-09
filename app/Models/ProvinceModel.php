<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProvinceModel extends Model
{
    protected $table = 'province';

    protected $fillable = [
        'code',
        'name'
    ];
}