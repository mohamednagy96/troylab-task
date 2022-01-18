<?php

namespace Tests;

use App\Models\School;
use App\Models\Student;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;

abstract class TestCase extends BaseTestCase
{

    use CreatesApplication, DatabaseMigrations;

    public function setup(): void{
        parent::setUp();


        if(! Schema::hasTable('students') || ! Schema::hasTable('schools')){
            Artisan::call('migrate:fresh');
        }
        if(Student::count() == '0' || School::count() == '0'){
            Artisan::call('db:seed');
        }
        
        
    }
}
