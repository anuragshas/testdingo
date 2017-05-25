<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;


class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public $token_body;

    public function testLoginTest()
    {

        $response = $this->post( 'api/oauth/access_token', [
            'username'      => 'xyz@example.com',
            'password'      => 'qwerty',
            'grant_type'    => 'password',
            'client_id'     => '2e0939632f65c1d362ee68575a7757b4',
            'client_secret' => '66e8a7b96279e67caa02f6295e87c5a9'
        ]);
        global $token_body;
        $token_body = $response->original;
        $response->assertStatus(200);

    }

    public function testUserTest(){
        global $token_body;
       //echo $token_body['access_token'];
        $response = $this->get('api/user', ['Authorization' => $token_body['token_type'].' ' . $token_body['access_token']]);
        //print_r($response);
        $user = app('Dingo\Api\Auth\Auth')->user();
        $data['username'] = $user->name;
        $data['email'] = $user->email;
        //$data['garbage'] = 'blah blah';
        //echo $response->getContent();
        $response->assertStatus(200)->assertJson([
            'data' => $data
        ]);
    }
}
