<?php

namespace App\Console\Commands;

use App\Models\Student;
use Illuminate\Console\Command;

class ChangeStatusOfStudent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'student:change-staus';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'change status form inactive to active every week';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $students = Student::where('status','inactive')->get();
        foreach($students as $student){
            $student->update(['status' => 'active']);
        }
    }
}
