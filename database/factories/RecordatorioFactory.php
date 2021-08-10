<?php

namespace Database\Factories;

use App\Models\Recordatorio;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cita;
class RecordatorioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Recordatorio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           
                'notif'=>$this->faker->swiftBicNumber,
                'anti_dias'=>$this->faker->swiftBicNumber,
                'medio'=>$this->faker->swiftBicNumber,
                'cita_id' => Cita::factory()->create()->id,
                /*$Recordatorio->notif=$request->notificacion;
    $Recordatorio->anti_dias=$request->dias;
    $Recordatorio->medio=$request->medio;*/
           
        ];
    }
}
