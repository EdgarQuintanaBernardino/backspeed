<?php

namespace Database\Factories;

use App\Models\Recepcion;
use App\Models\Cotizacion;
use Illuminate\Database\Eloquent\Factories\Factory;

class RecepcionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recepcion::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
     
           
        return [
            'n_orden'=>$this->faker->randomDigit ,
            'tip_serv'=>$this->faker->randomElement(['Garantia','Rescate vial','Servicio']),
            'kilometraje'=>$this->faker->randomDigit ,
            'n_combustible'=>$this->faker->randomDigit ,
            'desc_falla'=>$this->faker->text($maxNbChars = 100) ,
            'obs_general'=>$this->faker->text($maxNbChars = 40) ,
            'fotos'=>$this->faker->mimeType,
            'componentes'=>$this->faker->text($maxNbChars = 20) ,
            
        ];
    }
      
    
}
