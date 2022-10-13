<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::query()->create([
           'name' => 'Anas Memalee',
           'email' => 'anasment6@gmail.com',
           'password' =>Hash::make('1234'),
        ]);

        User::factory(mt_rand(5,15))->create();
    }
}
