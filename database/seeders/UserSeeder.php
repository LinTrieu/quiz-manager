<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Database\Factories\UserFactory;

class UserSeeder extends Seeder
{
    const NUMBER_OF_USERS = 10;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::count()) {
            echo "Skipping User; data already exists\n";
            return;
        }
        
        // laravel 8 upgrade
        User::factory()->count(self::NUMBER_OF_USERS)->create();

        // laravel 7 deprecated
        // factory(User::class, self::NUMBER_OF_USERS)->create();

        // pre-configured user data for manual testing purposes
        $restricted = new User();
        $restricted->first_name = 'Restricted';
        $restricted->last_name = 'User';
        $restricted->email = 'restricted@test.com';
        $restricted->password = Hash::make('password');
        $restricted->permission_level = 1;
        $restricted->save();

        $view = new User();
        $view->first_name = 'View';
        $view->last_name = 'User';
        $view->email = 'view@test.com';
        $view->password = Hash::make('password');
        $view->permission_level = 2;
        $view->save();

        $edit = new User();
        $edit->first_name = 'Edit';
        $edit->last_name = 'User';
        $edit->email = 'edit@test.com';
        $edit->password = Hash::make('password');
        $edit->permission_level = 3;
        $edit->save();
    }
}
