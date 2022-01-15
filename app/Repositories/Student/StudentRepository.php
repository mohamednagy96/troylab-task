<?php

namespace App\Repositories\Student;


use App\Models\Student;

use App\Repositories\Student\StudentRepositoryInterface;
use Illuminate\Support\Facades\Hash;

class StudentRepository implements StudentRepositoryInterface
{

    private $model;

    public function __construct(Student $model)
    {
        $this->model = $model;
    }

    public function list(array $data = null , $paginate = null)
    {
        $q = $this->model->query();
        if(isset($data['is_active'])){
            $q->where('is_active',$data['is_active']);
        }
        if(isset($data['email'])){
            $q->where('email',$data['email']);
        }
        if(isset($data['school_id'])){
            $q->where('school_id',$data['school_id']);
        }

       if($paginate)
        {
            $q = $q->paginate();
        }else
        {
            $q = $q->get();
        }

        return $q;

    }


    public function create(array $data)
    {
     $student = $this->model->create($data);
    }

    public function update(array $data, Student  $student )
    {
        $student ->update($data);
    }

    public function delete(Student  $student )
    {
        $student ->delete();
    }

    public function show(Student  $student )
    {
        return $student ;
    }
}
