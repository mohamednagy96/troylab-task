<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'email' , 'phone' , 'code' , 'dob' , 'gender' , 'join_date' ,'is_active' , 'school_id' , 'level'] ;


    public function school(){
        return $this->belongsTo(School::class);
    }
}
