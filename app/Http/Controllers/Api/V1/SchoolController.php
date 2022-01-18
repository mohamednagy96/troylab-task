<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\School\SchoolListRequest;
use App\Http\Resources\Api\School\SchoolsResource;
use App\Repositories\School\SchoolRepositoryInterface;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    use CoreJsonResponse;
    public $school ;
    public function __construct(SchoolRepositoryInterface $school)
    {
        $this->school = $school ;
    }

    public function __invoke(SchoolListRequest $request)
    {
        $data = $request->validated();
        $schools = $this->school->list($data,$request->page);
        return  $request->query('page') ?  $this->okWithPagination(SchoolsResource::collection($schools)): $this->ok(SchoolsResource::collection($schools)->resolve());
    }
}
