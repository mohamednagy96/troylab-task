<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Repositories\Payment\PaymentRepositoryInterface;
use App\Repositories\School\SchoolRepositoryInterface;
use App\Repositories\Student\StudentRepositoryInterface;

use League\OAuth2\Server\Repositories\UserRepositoryInterface;

class HomeController extends Controller
{
    private $student;
    private $schools;


    public function __construct(StudentRepositoryInterface $student , SchoolRepositoryInterface $school)
    {
        $this->student =$student;
        $this->school =$school;

    }
    public function index()
    {
        $students=$this->student->list()->count();
        $schools=$this->school->list()->count();

        return view('admin.pages.home',compact('students' , 'schools'));
    }

}
