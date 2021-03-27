<?php namespace App\Models;

use CodeIgniter\Model;

class Tabla_equipos_torneos extends Model{
    protected $table      = 'equipos_torneos';
    protected $primaryKey = 'id_torneo';
    protected $returnType = 'object';
    protected $allowedFields = ['id_equipo','id_torneo'];

    public function verificar_equipo_en_torneo($id_equipo,$id_torneo){
        $bandera = $this->select('id_equipo')
                        ->where('id_equipo', $id_equipo)
                        ->where('id_torneo', $id_torneo)
                        ->find();
         if (empty($bandera) == TRUE) {
             return FALSE;
         }
         else {
             return TRUE;
         }
    }

    public function eliminar_equipo_torneo($id_equipo,$id_torneo){
        $resultador = $this->query("DELETE FROM equipos_torneos WHERE id_equipo = $id_equipo and id_torneo = $id_torneo");
        $resultador->getResult('object');
        // dd($resultador);
        // return $query;
    }
}//end of model Usuario
