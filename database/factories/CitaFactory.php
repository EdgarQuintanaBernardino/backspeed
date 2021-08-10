<?php

namespace Database\Factories;

use App\Models\Cita;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Status;
class CitaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cita::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $id_usuario = $this->faker->randomElement(User::pluck('id'));
        $id_status = $this->faker->randomElement(Status::pluck('id'));
        
        return [
            'fecha'=>$this->faker->date,
            'nom_cita'=>$this->faker->name,
            'hora'=>$this->faker->unique()->time,
            'nota'=>$this->faker->word(),
            'plac_vehiculo' =>$this->faker->swiftBicNumber,
            'opc_domi'=>$this->faker->randomElement(['Si','No']),
            'calle'=>$this->faker->streetAddress,
            'num'=>$this->faker->randomDigit,
            'cp'=>$this->faker->postcode,
            'colonia'=>$this->faker->address,
            'nom_chofer'=>$this->faker->name,
            'correo'=>$this->faker->email,
            'concretado'=>$this->faker->randomElement(['Concretado','No Contretado']),
            'user_id' => $id_usuario,
            'status_id'=>$id_status



        ];
    } 
}
