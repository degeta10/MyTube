<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::create([
            'name'              => 'Sample User',
            'email'             => 'test@test.com',
            'password'          => 'password',
            'email_verified_at' => \Carbon\Carbon::now(),
        ]);

        \App\Models\User::factory(10)->create();
    }
}
