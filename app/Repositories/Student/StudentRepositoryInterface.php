<?php

namespace App\Repositories\Student;

use App\Models\Student;

interface StudentRepositoryInterface{

    public function list(array $data  = null, $paginate = null);

    public function create(array $data);

    public function update(array $data, Student $student);

    public function delete(Student $student);
    
    public function show(Student $student);


}
