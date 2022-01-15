<?php

namespace App\Console\Commands;

use App\Models\PermissionGroup;
use App\Models\Section;
use Illuminate\Console\Command;

class CreatePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'section:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create permission for sections';

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
        foreach (Section::all() as $section) {
            $name = $section->name;
            $id = $section->id;
            $permissions = [$name =>[$id.'_list',$id.'_create',$id.'_edit',$id.'_delete']];
            foreach ($permissions as $key => $value) {
            $permissionGroup = PermissionGroup::firstOrCreate([
                'name' => $key
            ]);
            foreach ($value as $permission) {
                $permissionGroup->permissions()->firstOrCreate(['name' => $permission, 'guard_name'=> 'admin' , 'section_id'=>$section->id]);
                }
            }
        }
    }
}
