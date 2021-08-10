<?php

namespace Database\Factories;

use App\Models\Directorio;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class DirectorioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Directorio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id_usuario = $this->faker->randomElement(User::pluck('id'));
        return [
            'nom'=>$this->faker->name,
            'puest'=>$this->faker->jobTitle,
            'correo' => $this->faker->unique()->safeEmail,
            'tel'=>$this->faker->unique()->tollFreePhoneNumber ,
            'user_id'   => $id_usuario,
        ];
    }
}
