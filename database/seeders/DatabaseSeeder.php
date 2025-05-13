<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
        ]);

        User::factory()->create([
            'name' => 'developer1',
            'email' => 'developer1@admin.com',
        ]);

        User::factory()->create([
            'name' => 'developer2',
            'email' => 'developer2@admin.com',
        ]);

        User::factory()->create([
            'name' => 'developer3',
            'email' => 'developer3@admin.com',
        ]);

        $this->call(
            [
                ProjectSeeder::class,
                PeriodSeeder::class,
            ]
        );
    }
}
