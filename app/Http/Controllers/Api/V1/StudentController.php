<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Student\StudentListRequest;
use App\Http\Requests\Api\Student\StudentStoreRequest;
use App\Http\Requests\Api\Student\StudentUpdateRequest;
use App\Http\Resources\Api\Student\StudentResource;
use App\Http\Resources\Api\Student\StudentsResource;
use App\Models\Student;
use App\Repositories\Student\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use CoreJsonResponse;

    private $student;
    public function __construct(StudentRepositoryInterface $student)
    {

        $this->student = $student;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(StudentListRequest $request)
    {
        
        $data = $request->validated();
        $students = $this->student->list($data,$request->page);
        return  $request->query('page') ?  $this->okWithPagination(StudentsResource::collection($students)): $this->ok(StudentsResource::collection($students)->resolve());
    }

    public function show(Student $student){
        $student= $this->student->show($student);
        return $this->okShow( new StudentResource($student));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentStoreRequest $request)
    {
        $data= $request->validated();
        $this->student->create($data);
        return $this->ok();
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentUpdateRequest $request, Student $student)
    {
        $data= $request->validated();

        $this->student->update($data,$student);
        return $this->ok();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $this->student->delete($student);
        return $this->ok();
    }

}
