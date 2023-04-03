<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Mauricio',
            'email' => 'mauricio@gmail.com',
            'rpe' => 'IMMF2821',
            'password' => bcrypt('123456789')
        ]);

        $user->assignRole('admin');

        User::factory(99)->create();
    }
}
