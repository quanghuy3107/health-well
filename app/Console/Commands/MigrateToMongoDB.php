<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class MigrateToMongoDB extends Command
{
    protected $signature = 'app:migrate-to-mongodb {--fresh : Drop all MongoDB collections before seeding}';
    protected $description = 'Migrate data from JSON/hardcode to MongoDB collections';

    public function handle(): int
    {
        $this->info('Starting MongoDB data migration...');

        if ($this->option('fresh')) {
            $this->warn('Dropping all MongoDB collections...');

            $connection = app('db')->connection('mongodb');
            $collections = ['products', 'categories', 'blog_posts', 'site_settings'];

            foreach ($collections as $collection) {
                $connection->getCollection($collection)->drop();
                $this->line("  Dropped: {$collection}");
            }

            $this->newLine();
        }

        $this->call('db:seed', ['--class' => 'Database\\Seeders\\MongoProductSeeder']);
        $this->call('db:seed', ['--class' => 'Database\\Seeders\\MongoBlogSeeder']);
        $this->call('db:seed', ['--class' => 'Database\\Seeders\\MongoSiteSettingSeeder']);

        $this->newLine();
        $this->info('✓ MongoDB migration completed successfully!');
        $this->table(
            ['Collection', 'Documents'],
            [
                ['products', \App\Models\Product::count()],
                ['categories', \App\Models\Category::count()],
                ['blog_posts', \App\Models\BlogPost::count()],
                ['site_settings', \App\Models\SiteSetting::count()],
            ]
        );

        return Command::SUCCESS;
    }
}
