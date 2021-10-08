<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    public function dept(){
        return $this->belongsTo(Department::class,'department_id');
    }

    public function task(){
        return $this->hasMany(Task::class);
    }
}
