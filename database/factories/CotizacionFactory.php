<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Vehiculo;
use App\Models\Reparacion;
use App\Models\Cotizacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class CotizacionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cotizacion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
    
        return [
            'tip_orden'=>$this->faker->randomElement(['Servicio','Garantía','Rescate vial']),
            't_sin_iva'=>$this->faker->randomDigit,
            't_con_iva'   => $this->faker->randomDigit ,
            't_descuento'   => $this->faker->randomDigit ,
            'gran_total'   => $this->faker->randomDigit ,
            
        ];
    }
}
