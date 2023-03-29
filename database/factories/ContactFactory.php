<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail(),
            'whatsapp_link' =>$this->faker->url(),
            'telegram_link' =>$this->faker->url(),
            'instagram_link' =>$this->faker->url(),
            'signature' =>$this->faker->text(),

        ];
    }
}
