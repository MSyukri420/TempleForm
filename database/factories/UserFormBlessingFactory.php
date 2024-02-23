<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\UserForm;
use App\Models\BlessingType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserFormBlessing>
 */
class UserFormBlessingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_form_id' => UserForm::factory(),
            'blessing_type_id' => BlessingType::factory(),
            'answer1' => $this->faker->paragraph,
            'answer2' => $this->faker->paragraph,
        ];
    }
}
