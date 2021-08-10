<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Credito;
use App\Models\Factura;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
      $user = User::create([
        'id'                => 1,
        'img_rut'           => env('PREFIX'),
        'img_nom'           => 'perfil/perfil-1582071257.png',
        'id_suc_act'        => 1,
        'reg_tab_acces'     => true,
        'notif'             => true,
        'tip_cliente'       =>'flotilla',
        'emp'               =>'Gm integraciones',
        'name'              => 'Julio Cesar',
        'apell'             => 'Vilchis Nando',
        'email_registro'    => 'desarrollospeed12@gmail.com',
        'email'             => 'desarrollospeed12@gmail.com',
        'email_verified_at' => now(),
        'tel_mov'           => '(557) 907-8189',
        'password'          => '$2y$10$CVbZ5SZrZTqma7H8rd6i2OM5uYrU5z3y8GODB3AZp4wj2fTxwyr8W', // Password2
        'menuroles'         => 'user,admin',
        'remember_token'    => \Str::random(10),
        'asig_reg'          => 'desarrollospeed12@gmail.com',
        'created_at_reg'    => 'desarrollospeed12@gmail.com'
        
      ]);
      $user->assignRole(['admin','user','desarrollador']);
      $user = User::create([
        'id'                => 2,
        'id_suc_act'        => 1,
        'reg_tab_acces'     => true,
        'notif'             => true,
        'tip_cliente'       =>'particular',
        'emp'               =>'particular',
        'name'              => 'Usuario',
        'apell'             => 'Pruebas',
        'email_registro'    => 'pruebas@admin.com',
        'email'             => 'pruebas@admin.com',
        'email_verified_at' => now(),
        'tel_mov'           => '(551) 000-0000',
        'password'          => '$2y$10$CVbZ5SZrZTqma7H8rd6i2OM5uYrU5z3y8GODB3AZp4wj2fTxwyr8W', // Password2
        'menuroles'         => 'user,admin',
        'remember_token'    => \Str::random(10),
        'asig_reg'          => 'desarrolloweb.ewmx@gmail.com',
        'created_at_reg'    => 'desarrolloweb.ewmx@gmail.com'
      ]);
      $user->assignRole(['admin', 'pruebas']);
    }
}
