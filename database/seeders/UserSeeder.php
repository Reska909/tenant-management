<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {

        User::updateOrCreate(

            [
                'email'=>'user@bpbatam.local'
            ],

            [

                'name'=>'Petugas',

                'password'=>Hash::make('User123!'),

                'role'=>'user'

            ]

        );

    }
}