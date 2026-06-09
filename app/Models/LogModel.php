<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LogModel extends Model
{
    protected $table = 'log';

    protected $fillable = [
        'method',
        'endpoint',
        'request_data',
        'response_data',
        'status'
    ];
}