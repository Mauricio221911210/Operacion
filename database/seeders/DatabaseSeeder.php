<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\level;
use App\Models\Platform;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       Storage::deleteDirectory('archive');
       Storage::makeDirectory('archive');

        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PriceSeeder::class);
        $this->call(CourseSeeder::class); 
        
    }
}
