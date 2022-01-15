<?php

namespace App\Console\Commands;

use App\Events\GenerateUsers;
use App\Models\Student;
use Illuminate\Console\Command;

class AddNewStudents extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:generate-users {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates test students data and insert into the databas';

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
        $noOfStudents = $this->argument('count');
        for ($i = 0; $i < $noOfStudents; $i++) {
            Student::factory()->create();
        }
        event(new GenerateUsers($noOfStudents));
        $this->info('done');
        // return 0;
    }
}
