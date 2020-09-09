<?php

namespace Tests\Feature;

use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserLogin()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
