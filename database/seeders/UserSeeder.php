<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void 
    {
        //
        $users = [
            [
                'name' => 'becaye diop',
                'email' => 'becaye.diop@example.com',
                 'password' => bcrypt('password')
            ],
            [
                'name' => 'dame diop',
                'email' => 'dame.diop@example.com',
                'password' => bcrypt('password')    
            ],

            [
                'name' => 'Alune Johnson',
                'email' => 'alune.johnson@example.com',
                'password' => bcrypt('password')
            ]
        ];


        foreach ($users as $user) {
            \App\Models\User::create($user);    
        }
    }
}

