<?php
use App\Role;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $owner = new Role();
        $owner->name  =  'owner';
        $owner->display_name = 'Product Owner';
        $owner->description = 'Product owner is ';
        $owner->save();

        $owner = new Role();
        $owner->name  =  'admin';
        $owner->display_name = 'Admin user';
        $owner->description = 'Product owner is admin';
        $owner->save();
    }
}
