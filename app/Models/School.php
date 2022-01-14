<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $fillable = ['title' , 'description' , 'level_count' , 'is_active'] ;

    public function students(){
        return $this->hasMany(Student::class , 'school_id');
    }
}
