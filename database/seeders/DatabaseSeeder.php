<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(100)->create();

        \App\Models\User::factory(1)->create([
            'name' => 'Test ADmin',
            'email' => 'test@example.com',
            'userType' => 'ADM',
            'email_verified_at' => now(),
            'password' => '$2y$10$zB51E5Kktvf8iozW9k0IGek1eTQLDgv0txdcPUde1kSdnfZX0PX.O', // password
            'remember_token' => Str::random(10),
        ]);
        \App\Models\Product::factory(1)->create();

        \App\Models\Role::factory(1)->create([
            'name' => 'ADM',
            'display_name' => 'Admin',
        ]);
        \App\Models\Role::factory(1)->create([
            'name' => 'DEV',
            'display_name' => 'Developer',
        ]);
        \App\Models\Role::factory(1)->create([
            'name' => 'USR',
            'display_name' => 'User',
        ]);
    }
}
