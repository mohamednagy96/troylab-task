<?php

namespace App\Repositories\School;

use App\Models\School;

interface SchoolRepositoryInterface{

    public function list(array $data  = null, $paginate = null);

    public function create(array $data);

    public function update(array $data, School $school);

    public function delete(School $school);
    
    public function show(School $school);


}
