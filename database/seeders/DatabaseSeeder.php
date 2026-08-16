<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tạo admin user
        User::updateOrCreate(
            ['email' => 'admin@homewellnessforyou.com'],
            [
                'name' => 'Admin',
                'email' => 'admin@homewellnessforyou.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
            ]
        );

        // Tạo test user
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => Hash::make('password'),
                'role' => 'user',
            ]
        );

        // Seed MongoDB collections
        $this->call([
            MongoProductSeeder::class,
            MongoBlogSeeder::class,
            MongoSiteSettingSeeder::class,
        ]);
    }
}
