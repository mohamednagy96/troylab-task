<?php

namespace App\Repositories\School;


use App\Models\School;

use App\Repositories\School\SchoolRepositoryInterface;

class SchoolRepository implements SchoolRepositoryInterface
{

    private $model;

    public function __construct(School $model)
    {
        $this->model = $model;
    }

    public function list(array $data = null , $paginate = null)
    {
        $q = $this->model->query();
        if(isset($data['is_active'])){
            $q->where('is_active',$data['is_active']);
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
     $school = $this->model->create($data);
    }

    public function update(array $data, School  $school )
    {
        $school ->update($data);
    }

    public function delete(School  $school )
    {
        $school ->delete();
    }

    public function show(School $school )
    {
        return $school ;
    }
}
