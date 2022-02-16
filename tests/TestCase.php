<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Hash;
use \App\Models\UserPermission;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    public function loginWithFakeUser(): void
    {
        $user = User::factory()->create([
            'id' => 1,
            'first_name' => 'David',
            'last_name' => 'Smith',
            'email' => 'david.smith@gmail.com',
            'password' => Hash::make('password'),
        ]);

        $this->be($user);
    }

    public function loginWithRestrictedUser(): void
    {
        $user = User::factory()->create([
            'id' => 1,
            'first_name' => 'Restricted',
            'last_name' => 'User',
            'email' => 'restricted@gmail.com',
            'password' => Hash::make('password'),
            'permission_level' => UserPermission::PERMISSION_RESTRICT,
        ]);

        $this->be($user);
    }

    public function loginWithViewUser(): void
    {
        $user = User::factory()->create([
            'id' => 1,
            'first_name' => 'View',
            'last_name' => 'User',
            'email' => 'view@gmail.com',
            'password' => Hash::make('password'),
            'permission_level' => UserPermission::PERMISSION_VIEW,
        ]);

        $this->be($user);
    }

    public function loginWithEditUser(): void
    {    
        $user = User::factory()->create([
            'id' => 1,
            'first_name' => 'Edit',
            'last_name' => 'User',
            'email' => 'edit@gmail.com',
            'password' => Hash::make('password'),
            'permission_level' => UserPermission::PERMISSION_EDIT,
        ]);

        $this->be($user);
    }
}
