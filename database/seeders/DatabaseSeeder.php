<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Callers;

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
        
        //create caller object
        $caller=new Callers();
        $caller->name = 'Juan Alberto';
        $caller->lastname = 'Vargas';
        $caller->dni = '11333061';
        $caller->mail = 'juavargas@sgr.com.ar';
        $caller->phone = '263-898-9000';
        $caller->location = 'Bº 7 colores 1';
        $caller->save();

    }
}
