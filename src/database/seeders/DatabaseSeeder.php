<?php

namespace Database\Seeders;

use App\Models\Link;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Create a user for testing
    $user = User::factory()->create([
        'name' => 'Azael',
        'email' => 'aza@openbio.com',
        'password' => bcrypt('12345678'),
    ]);

    // Create links for the user
    Link::create([
        'user_id' => $user->id,
        'title' => 'Mi GitHub',
        'url' => 'https://github.com/AzaelReyesMartel-1ASIR',
        'icon' => 'fa-brands fa-github',
    ]);

    Link::create([
        'user_id' => $user->id,
        'title' => 'LinkedIn Profesional',
        'url' => 'https://www.linkedin.com/in/azael-reyes-a18996329/',
        'icon' => 'fa-brands fa-linkedin',
    ]);
}
}
