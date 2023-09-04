<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $name = 'Admin';
        $email = 'admin@admin.com';

        $adminRole = config('permission.models.role')::firstOrCreate([
            'name' => 'admin',
        ], ['guard_name' => 'web']);

        $createUser = config('permission.models.permission')::firstOrCreate([
            'name' => 'create user',
        ], ['guard_name' => 'web']);

        $attachFiles = config('permission.models.permission')::firstOrCreate([
            'name' => 'attach files',
        ], ['guard_name' => 'web']);

        $adminRole->givePermissionTo($createUser);
        $adminRole->givePermissionTo($attachFiles);

        $password = app()->isProduction() ? Str::random() : 'secret';

        $user = User::firstOrCreate([
            'email' => $email,
        ], [
            'name' => $name,
            'password' => Hash::make($password),
        ]);

        $user->assignRole($adminRole);

        if ($user->wasRecentlyCreated) {
            $this->command->info("Admin user ($name) created.");
            $this->command->info("E-Mail: $email");
            $this->command->info("Password: $password");
        }
    }
}
