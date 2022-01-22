<?php

namespace Database\Factories;

use App\Models\Channel;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::all()->random();
        $channel = Channel::where('user_id', '!=', $user->id)->get()->random();
        return [
            'user_id'       => $user->id,
            'channel_id'    => $channel->id,
        ];
    }
}
