<?php
namespace Database\Seeders;

use App\Models\Sucursal;
use App\Models\SucursalEtiqueta;
use Illuminate\Database\Seeder;
//use database\seeds\NotesTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(MenusTableSeeder::class);
        //$this->call(UsersAndNotesSeeder::class);
        /*
        $this->call('UsersAndNotesSeeder');
        $this->call('MenusTableSeeder');
        $this->call('FolderTableSeeder');
        $this->call('ExampleSeeder');
        $this->call('BREADSeeder');
        $this->call('EmailSeeder');
        */
        $this->call([
          PermisoTableSeeder::class,
          RoleTableSeeder::class,
          UserTableSeeder::class, 
          SistemaTableSeeder::class, 
          CitaTableSeeder::class,
         // RecordatorioTableSeeder::class, 
          SucursalTableSeeder::class,
          SucursalEtiquetasTableSeeder::class,
          UserSucursalTableSeeder::class,
          ArchivoTableSeeder::class,
          QuejaYSugerenciaTableSeeder::class,
          QuejaYSugerenciaArchivoTableSeeder::class,
          QuejaYSugerenciaSucursalTableSeeder::class,
          EmailSeeder::class,
          StatusSeeder::class,
          /* ========================================== */
          UsersAndNotesSeeder::class,
          MenusTableSeeder::class,
          FolderTableSeeder::class,
          ExampleSeeder::class,
          BREADSeeder::class, 
          CreditoTableSeeder::class,
          FacturaTableSeeder::class,
          DirectorioTableSeeder::class,
          VehiculoTableSeeder::class,
          ReparacionTableSeeder::class,
          RefaccionTableSeeder::class,
          ManoObraTableSeeder::class,
          CotizacionTableSeeder::class,
          CatalogoTableSeeder::class,
          UserVehiculoSeeder::class,
          RecepcionTableSeeder::class,
          VehiculoCotizacionTableSeeder::class,
          UserCotizacionTableSeeder::class ,     
          CatalogoCotizacionTableSeeder::class ,
          RecepcionClienteTableSeeder::class ,
          RecepcionVehiculoTableSeeder::class ,
          ReparacionCatalogoTableSeeder::class ,
          ReparacionCotizacionTableSeeder::class ,
          ReparacionManoObraTableSeeder::class ,
          ReparacionRefaccionTableSeeder::class ,
          VehiculoReparacionTableSeeder::class 

        ]);
    }
}
