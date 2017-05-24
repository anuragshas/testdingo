<?php

use Illuminate\Database\Seeder;
use App\Project;
// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class ProjectsTableSeeder extends Seeder
{
    public function run()
    {
        $owner = new Project();
        $owner->name  =  'XYZ';
        $owner->customer = 'AB';
        $owner->save();
    }
}
