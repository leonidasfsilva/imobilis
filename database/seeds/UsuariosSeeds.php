<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsuariosSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (User::where('email', '=', 'admin@mail.com')->count()) {
            $usuario           = User::where('email', '=', 'admin@mail.com')->first();
            $usuario->name     = "Administrador do Sistema";
            $usuario->email    = "admin@mail.com";
            $usuario->password = bcrypt("123456");
            $usuario->save();
        } else {
            $usuario           = new User();
            $usuario->name     = "Administrador do Sistema";
            $usuario->email    = "admin@mail.com";
            $usuario->password = bcrypt("123456");
            $usuario->save();
        }
    }
}
