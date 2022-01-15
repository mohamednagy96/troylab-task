<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Student\ListStudentRequest;
use App\Http\Requests\Admin\Student\StudentStoreRequest;
use App\Http\Requests\Admin\Student\StudentUpdateRequest;
use App\Models\School;
use App\Models\Student;
use App\Repositories\Student\StudentRepositoryInterface;
use App\Traits\DashboardRedirects;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    use DashboardRedirects;
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
    public function index(Request $request)
    {
        
        $students = $this->student->list(['school_id' => $request->school_id],$paginate = true);
        return view('admin.pages.students.index', compact('students'));
    }

    public function show(Student $student){
        return view('admin.pages.students.show', compact('student'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::pluck('title','id')->toArray();
        return view('admin.pages.students.create',compact('schools'));
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
        return $this->redirectRouteWithSuccessStore('admin.students.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $schools = School::pluck('title','id')->toArray();
        return view('admin.pages.students.edit', compact('student','schools'));
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

        return $this->redirectRouteWithSuccessUpdate('admin.students.index');
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
        return $this->redirectRouteWithSuccessDelete();
    }

}
