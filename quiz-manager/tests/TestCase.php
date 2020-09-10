<?php

namespace Tests;

use App\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Hash;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function loginWithFakeUser(): void
    {
        $user = new User([
            'id' => 1,
            'first_name' => 'David',
            'last_name' => 'Smith',
            'email' => 'david.smith@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $this->be($user);
    }
}
