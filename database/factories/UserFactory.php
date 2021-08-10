<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
//use App\Models\Users as User;
use App\Models\User as User;
use App\Models\Credito;
use App\Models\Factura;
use App\Models\Rol;


class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rol = $this->faker->randomElement(Rol::pluck('name'));
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'menuroles' =>$rol,
            'status' => 'Active',
            'tip_cliente'=>$this->faker->randomElement(['flotilla','particular']),
            'emp'=>$this->faker->company,
        ];
    }

    public function admin()
    {
        return $this->state(function (array $attributes) {
            return [
                'menuroles' => 'user,admin',
            ];
        });
    }
}
