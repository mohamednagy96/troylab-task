<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $fillable = ['name' , 'email' , 'mobile' , 'parent_number' , 'code' , 'dob' , 'gender' , 'join_date' ,'is_active' , 'school_id' , 'level'] ;

    protected $casts = [
        'dob' => 'date' ,
        'join_date' => 'date' 
    ];
    public function school(){
        return $this->belongsTo(School::class);
    }
}
