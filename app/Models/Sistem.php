<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sistem extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'sex',
        'age',
        'departure',
        'password',
        'employee_id',
        'master',
        'image',
    ];
}
