<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    public function users()   
    {
        return $this->belongsToMany(User::class);  
    }
    
    protected $fillable = [
        'task',
        'comment',
        'pdf',
        'start_date',
        'end_date',
    ];
}
