<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\School\SchoolStoreRequest;
use App\Http\Requests\Admin\School\SchoolUpdateRequest;
use App\Models\School;
use App\Repositories\School\SchoolRepositoryInterface;
use App\Traits\DashboardRedirects;
use Illuminate\Http\Request;

class SchoolController extends Controller
{   
    use DashboardRedirects;
    private $school;
    public function __construct(SchoolRepositoryInterface $school)
    {

        $this->school = $school;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = $this->school->list(null,$paginate = true);
        return view('admin.pages.schools.index', compact('schools'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.schools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SchoolStoreRequest $request)
    {
        $data= $request->validated();
        $this->school->create($data);
        return $this->redirectRouteWithSuccessStore('admin.schools.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view('admin.pages.schools.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SchoolUpdateRequest $request, School $school)
    {
        $data= $request->validated();
        $this->school->update($data,$school);
        return $this->redirectRouteWithSuccessUpdate('admin.schools.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(school $school)
    {
        $this->school->delete($school);
        return $this->redirectRouteWithSuccessDelete();
    }
}
