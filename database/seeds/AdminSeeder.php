<?php

use Illuminate\Database\Seeder;

use App\Laravel\Models\User;

use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => "master_admin",
            "name" => "admin",
            "email" => "admin@gmail.com",
            "password" => Hash::make('admin'),
        ]);
    }
}
