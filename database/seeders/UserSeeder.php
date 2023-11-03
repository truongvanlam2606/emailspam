<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($index = 1; $index < 10; $index++) {
            $name = "user{$index}";
            User::create([
                'first_name' => $name,
                'last_name' => $name,
                'name' => $name,
                'email' => "{$name}@gmail.com",
                'email_verified_at' => now(),
                'password' => Hash::make("12345678"),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
