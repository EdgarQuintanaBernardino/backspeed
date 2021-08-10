<?php
namespace App\Repositories\Diagnostico;
//Models
use App\Models\Diagnostico;


//Base de datos
use Illuminate\Support\Facades\DB;

// Otros
use Illuminate\Support\Facades\Cache;


class DiagnosticoRepositories implements DiagnosticoInterface {


      //Realizar el registro de un nuevo Catalogo
      public function store($request) {
    
        DB::beginTransaction();/*Uso de transacciones,no se realizarán registros de
         ninguna tabla si no se cumplen con los requerimientos */
        try {
     $diagnostico = new Diagnostico();  
    
  
        $diagnostico->balatas_delant=$request->delanteras;
        $diagnostico->nota_balatas_delant=$request->nota_bal_del;
        $diagnostico->balatas_tras=$request->traseras;
        $diagnostico->nota_balatas_tras=$request->nota_bal_tras;
        $diagnostico->luces=$request->calaberas;
        $diagnostico->nota_luces=$request->nota_calaberas;
        $diagnostico->cristales_espejos=$request->cristales;
        $diagnostico->nota_cristales_espejos=$request->nota_cristales;
        $diagnostico->puertas=$request->puertas;
        $diagnostico->nota_puertas=$request->nota_puertas;
        $diagnostico->salpicaderas=$request->salpicaderas;
        $diagnostico->nota_salpicaderas=$request->nota_facias;
        $diagnostico->asientos=$request->asientos;
        $diagnostico->nota_asientos=$request->nota_asientos;
        $diagnostico->direccionales=$request->direccionales;
        $diagnostico->nota_direccionales=$request->nota_direccionales;
        $diagnostico->radio=$request->radio;
        $diagnostico->nota_radio=$request->nota_radio;
        $diagnostico->partes_bajas=$request->partes_bajas;
        $diagnostico->nota_partes_bajas=$request->nota_partes_bajas;
        $diagnostico->caja_dir=$request->caja_direc;
        $diagnostico->nota_caja_dir=$request->nota_caja_dir;
        $diagnostico->bomba_dir=$request->bomba_direc;
        $diagnostico->nota_bomba_dir=$request->nota_bomba_dir;
        $diagnostico->brazo=$request->brazos;
        $diagnostico->nota_brazo=$request->nota_brazos;
        $diagnostico->guardapv=$request->guardapv_flecha;
        $diagnostico->nota_guardapv=$request->nota_guardapv;
        $diagnostico->manguera=$request->mangueras_fugas;
        $diagnostico->nota_manguera=$request->nota_mangueras_fugas;
        $diagnostico->bomba_boster=$request->bomba_boster;
        $diagnostico->nota_bomba_boster=$request->nota_bomba_boster;
        $diagnostico->mangueras_turbo=$request->mangueras_turbo;
        $diagnostico->nota_manguera_turbo=$request->nota_mangueras_turbos;
        $diagnostico->llanta_delantera_izq=$request->llanta_del_izq;
        $diagnostico->nota_llanta_delantera_izq=$request->nota_llanta_del_izq;
        $diagnostico->llanta_delantera_der=$request->llanta_del_der;
        $diagnostico->nota_llanta_delantera_der=$request->nota_llanta_del_der;
        $diagnostico->llanta_trasera_izq=$request->llanta_tras_izq;
        $diagnostico->nota_llanta_trasera_izq=$request->nota_llanta_tras_izq;
        $diagnostico->llanta_trasera_der=$request->llanta_tras_der;
        $diagnostico->nota_llanta_trasera_der=$request->nota_llanta_tras_der;
        $diagnostico->cuartos=$request->cuartos;
        $diagnostico->nota_cuartos=$request->nota_cuartos;
        $diagnostico->faros_baja_alta=$request->faros_alta_baja;
        $diagnostico->nota_faros_baja_alta=$request->nota_faros;
        $diagnostico->faros_niebla=$request->faros_niebla;
        $diagnostico->nota_faros_niebla=$request->nota_faros_niebla;
        $diagnostico->intermitentes_direccionales=$request->intermitentes;
        $diagnostico->nota_intermitentes=$request->nota_intermitentes;
        $diagnostico->luz_techo=$request->luz_techo;
        $diagnostico->nota_luz_techo=$request->nota_luz_techo;
        $diagnostico->reversa_alto=$request->alto_rev;
        $diagnostico->nota_reversa_alto=$request->nota_stop;
        $diagnostico->cables_bujias=$request->cables_bujias;
        $diagnostico->nota_cables_bujias=$request->nota_cables;
        $diagnostico->manguera_estado=$request->mangueras_estado;
        $diagnostico->nota_manguera_estado=$request->nota_mangueras_estado;
        $diagnostico->bandas=$request->bandas_motor;
        $diagnostico->nota_bandas=$request->nota_bandas;
        $diagnostico->fuga_aire=$request->fugas_aire;
        $diagnostico->nota_fuga_aire=$request->nota_fugas_aire;
        $diagnostico->alineacion_motor=$request->alin_motor;
        $diagnostico->nota_alineacion_motor=$request->nota_alin_motor;
        $diagnostico->aceite_motor=$request->aceit_motor;
        $diagnostico->nota_aceite_motor=$request->nota_aceit_motor;
        $diagnostico->aceite_direccion_h=$request->aceit_dir_h;
        $diagnostico->nota_aceite_direccion_h=$request->nota_aceit_dir_h;
        $diagnostico->aceite_transmision=$request->aceit_trans;
        $diagnostico->nota_aceite_transmision=$request->nota_aceit_trans;
        $diagnostico->liquido_refri=$request->liq_refrigerante;
        $diagnostico->nota_liquido_refrigerante=$request->nota_liq_ref;
        $diagnostico->liquido_frenos=$request->liq_frenos;
        $diagnostico->nota_liquido_frenos=$request->nota_liq_frenos;
        $diagnostico->liquido_limpiaparabrisas=$request->liq_limpiaparabrisas;
        $diagnostico->nota_liquido_limpiaparabrisas=$request->nota_liq_limpiaparabrisas;
        $diagnostico->indicadores_abordo=$request->ind_abordo;
        $diagnostico->nota_indicadores_abordo=$request->nota_ind_abor;
        $diagnostico->claxon=$request->claxon;
        $diagnostico->nota_claxon=$request->nota_claxon;
        $diagnostico->sistema_parabrisas=$request->sis_limpiaparabrisas;
        $diagnostico->nota_sistema_parabrisas=$request->nota_sis_limpiaparabrisas;
        $diagnostico->ventilacion=$request->ventilacion;
        $diagnostico->nota_ventilacion=$request->nota_ventilacion;
        $diagnostico->funcionamiento_compresor=$request->func_compresor;
        $diagnostico->nota_funcionamiento_compresor=$request->nota_compresor;
        $diagnostico->fugas_sistema_aa=$request->fugas_sist_aa;
        $diagnostico->nota_sistema_aa=$request->nota_fugas_aa;
        $diagnostico->filtro_polen=$request->filtro_polen;
        $diagnostico->nota_filtro_polen=$request->nota_filtro_polen;
        $diagnostico->bateria=$request->bateria;
        $diagnostico->nota_bateria=$request->nota_bateria;
        $diagnostico->rotulas=$request->rotulas_guar;
        $diagnostico->nota_rotulas=$request->nota_rotulas_guar;
        $diagnostico->amortiguadores_delant=$request->amort_del;
        $diagnostico->nota_amortiguadores_delant=$request->nota_amort_del;
        $diagnostico->base_amort_delant=$request->base_amort_del;
        $diagnostico->nota_base_amort_delant=$request->nota_base_amort_del;
        $diagnostico->barra_estab=$request->barra_estab;
        $diagnostico->nota_barra_estab=$request->nota_barra_estab;
        $diagnostico->muelles=$request->muelles;
        $diagnostico->nota_muelles=$request->nota_muelles;
        $diagnostico->soporte=$request->soporte;
        $diagnostico->nota_soporte=$request->nota_soporte;
        $diagnostico->amortiguadores_tras=$request->amort_tras;
        $diagnostico->nota_amortiguadores_tras=$request->nota_amort_tras;
        $diagnostico->base_amort_tras=$request->base_amort_tras;
        $diagnostico->nota_base_amort_tras=$request->nota_base_amort_tras;
        $diagnostico->resortes_suspencion=$request->resortes_susp;
        $diagnostico->nota_resortes_suspencion=$request->nota_resortes_susp;
        $diagnostico->eje_trasero=$request->eje_tras;
        $diagnostico->nota_eje_trasero=$request->nota_eje_trasero;
        $diagnostico->fuga_aceite_trans=$request->fuga_aceit_trans;
        $diagnostico->nota_fuga_aceite_trans=$request->nota_fuga_aceit_trans;
        $diagnostico->cubrepolvos_semiejes=$request->cubrepv_semiejes;
        $diagnostico->nota_cubrepolvos_semiejes=$request->nota_cubrepv_semiejes;
        $diagnostico->lineas_escape=$request->lineas_escape;
        $diagnostico->nota_lineas_escape=$request->nota_lineas_escape;
        $diagnostico->llanta_refaccion=$request->inspeccion_llanta;
        $diagnostico->nota_llanta_refaccion=$request->nota_inspeccion_llanta;
        $diagnostico->gomas_limpiaparabrisas=$request->gomas_limpiaparabrisas;
        $diagnostico->nota_gomas_limpiaparabrisas=$request->nota_gomas_limpiaparabrisas;
        $diagnostico->save();  
      
    DB::commit();
        } catch (\Exception $e) {
          DB::rollback();
          return $e->getMessage();      
        }
        return $diagnostico;
        
 
      }
}
