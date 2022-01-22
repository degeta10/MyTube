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
        $testUser = \App\Models\User::create([
            'name'              => 'Sample User',
            'email'             => 'test@test.com',
            'password'          => 'password',
            'email_verified_at' => \Carbon\Carbon::now(),
        ]);
        \App\Models\Channel::factory()->create([
            'title'     => $testUser->name,
            'user_id'   => $testUser->id,
        ]);
        \App\Models\User::factory(10)->create()->each(function ($user) {
            \App\Models\Channel::factory()->create([
                'title'     => $user->name,
                'user_id'   => $user->id,
            ]);
        });
    }
}
