<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Denunciante;

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

        $client=new Denunciante();
        $client->name_denunciante='Braian';
        $client->apellido_denunciante='Vargas';
        $client->dni_denunciante='41830596';
        $client->correo_denunciante='braianvargas1616@gmail.com';
        $client->telefono_denunciante='2645819065';
        $client->direccion_denunciante='CASA CASITA CASONA';

        $client->save();

    }
}
