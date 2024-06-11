<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'=>'moderator',
            'email'=>'moderator@gmail.com',
            'password'=>Hash::make('qwerty123'),
            'role'=>'moderator',
        ]);
    }
}
