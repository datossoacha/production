<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'                 => 1,
                'name'               => 'Admin',
                'email'              => 'admin@datossoacha.co',
                'password'           => bcrypt('Pxis5yi2$'),
                'remember_token'     => null,
                'approved'           => 1,
                'verified'           => 1,
                'verified_at'        => '2021-05-20 07:02:14',
                'verification_token' => '',
            ],
        ];

        User::insert($users);
    }
}
