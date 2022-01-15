<?php

namespace App\Repositories\Teacher;

use App\Models\Teacher;

interface TeacherRepositoryInterface{

    public function list(array $data = [],$paginate = null);

    public function create(array $data);

    public function update(array $data,$id):Teacher;

    public function delete($id):void;
    public function show($id): Teacher;

    public function statuses();

}



