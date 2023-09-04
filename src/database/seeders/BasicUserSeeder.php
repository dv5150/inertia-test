<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class BasicUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! app()->isProduction()) {
            $name = 'Johnny';
            $email = 'johnny@defaultuser.com';
            $password = 'secret';

            $user = User::firstOrCreate([
                'email' => $email,
            ], [
                'name' => $name,
                'password' => Hash::make($password),
            ]);

            if ($user->wasRecentlyCreated) {
                $this->command->info("Default user ($name) created.");
                $this->command->info("E-Mail: $email");
                $this->command->info("Password: $password");
            }
        }
    }
}
