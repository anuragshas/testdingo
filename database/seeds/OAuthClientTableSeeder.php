<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
//use Laracasts\TestDummy\Factory as TestDummy;

class OAuthClientTableSeeder extends Seeder
{
    public function run()
    {
        //Create website client secret

        \App\OAuthClient::create([
           'id'=>'2c0939632f65c1d362ee68675a7757b4',
            'secret' => '66f8a7b96279e67caa02f5295e87c5a9',
            'name' => 'Android',
        ]);

        \App\OAuthClient::create([
            'id'=>'2e0939632f65c1d362ee68575a7757b4',
            'secret' => '66e8a7b96279e67caa02f6295e87c5a9',
            'name' => 'Website',
        ]);
    }
}
