<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_task extends Model
{
    use HasFactory;
    
    /*public function tasks()   
    {//user_tasksテーブル一つに対してtask(テーブル)は複数
        return $this->hasMany(Task::class);  
    }
    
    public function user()   
    {//user_taskテーブル一つに対してuser(テーブル)は複数
        return $this->belongsTo(User_task::class);  
    }*/
}
