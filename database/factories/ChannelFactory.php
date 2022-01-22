<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChannelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::all()->random();
        return [
            'title'         => $user->name,
            'description'   => $this->faker->sentences(2, true),
            'image'         => '',
            'user_id'       => $user,
        ];
    }
}
