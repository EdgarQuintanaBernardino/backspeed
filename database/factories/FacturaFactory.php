<?php

namespace Database\Factories;

use App\Models\Factura;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FacturaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Factura::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id_usuario = $this->faker->randomElement(User::pluck('id'));
        return [
            'tip'=>$this->faker->randomElement(['Moral','Fisica']),
            'rfc'=>$this->faker->unique()->swiftBicNumber  ,
            'r_social' => $this->faker->unique()->swiftBicNumber  ,
            'calle'=>$this->faker->secondaryAddress  ,
            'n_ext'=>$this->faker->buildingNumber,
            'n_int'=>$this->faker->buildingNumber,
            'cp'=>$this->faker->postcode,
            'col' => $this->faker->citySuffix,
            'loc'=>$this->faker->citySuffix,
            'est'=>$this->faker->country,
            'cd'=>$this->faker->city,
            'tel1' => $this->faker->tollFreePhoneNumber,
            'tel2'=>$this->faker->tollFreePhoneNumber,
            'notas'=>$this->faker->paragraph,
              'user_id'   => $id_usuario,
        ];
    }
}
