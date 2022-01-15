<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nome' => "Cláudio",
            'email' => "claudio@teste.com",
            "password" => Hash::make('123456')
        ]);

        User::create([
            'nome' => "CCCC",
            'email' => "ccc@ccc.com",
            "password" => Hash::make('123456')
        ]);

        User::create([
            'nome' => "DDD",
            'email' => "ddd@ddd.com",
            "password" => Hash::make('123456')
        ]);

        User::create([
            'nome' => "BBBB",
            'email' => "bbbb@bbb.com",
            "password" => Hash::make('123456')
        ]);

        User::create([
            'nome' => "AAAA",
            'email' => "aaaa@aaaa.com",
            "password" => Hash::make('123456')
        ]);
    }
}
