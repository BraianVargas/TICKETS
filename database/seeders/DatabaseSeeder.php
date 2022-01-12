<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin=new User();
        $admin->name='admin';
        $admin->email='admin@test.com';
        $admin->role='admin';
        $admin->password='admin';

        $admin->save();

        $user=new User();
        $user->name='user';
        $user->email='user@test.com';
        $user->role='user';
        $user->password='1234';

        $user->save();

    }
}
