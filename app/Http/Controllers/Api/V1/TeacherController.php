<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Teacher\TeacherListRequest;
use App\Http\Requests\Api\V1\Teacher\TeacherStoreRequest;

use App\Http\Resources\Api\V1\Teacher\TeacherResource;
use App\Http\Resources\Api\V1\Teacher\TeachersResource;
use App\Repositories\Teacher\TeacherRepository;
use App\Repositories\Teacher\TeacherRepositoryInterface;
use App\Swagger\Interfaces\TeacherControllerInterface;
use Illuminate\Http\Request;

class TeacherController extends Controller implements TeacherControllerInterface
{
    use CoreJsonResponse;

    public function __construct(TeacherRepositoryInterface $teacher)
    {

        $this->teacher = $teacher;
    }

    public function  index(TeacherListRequest $request)
    {
        $data = $request->validated();
        $teachers = $this->teacher->list($data,$request->page);
        return  $request->query('page') ?  $this->okWithPagination(TeachersResource::collection($teachers)): $this->ok(TeachersResource::collection($teachers)->resolve());

    }

    public function  store(TeacherStoreRequest $request)
    {

        $data = $request->validated();

        $data['status'] = 'pending';
        $data['en']['name'] = $data['name_en'];
        $data['ar']['name'] = $data['name_ar'];
        $this->teacher->create($data);

        return  $this->ok();

    }
}
