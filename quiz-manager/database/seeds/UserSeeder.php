<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        factory(User::class, self::NUMBER_OF_USERS)->create();

        $lin = new User();
        $lin->first_name = 'Lin';
        $lin->last_name = 'Trieu';
        $lin->email = 'linna@gmail.com';
        $lin->password = Hash::make('password');
        $lin->permission_level = 3;
        $lin->save();
    }
}
