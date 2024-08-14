<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateRoot extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'root',
            'email'=>'root@world.com',
            'password'=>'password',
            'role'=>'root'
        ]);

        User::create([
            'name'=>'root1',
            'email'=>'root1@world.com',
            'password'=>'password',
            'role'=>'root'
        ]);
    }
}
