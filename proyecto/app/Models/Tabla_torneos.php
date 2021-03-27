<?php namespace App\Models;

use CodeIgniter\Model;

class Tabla_torneos extends Model{
    protected $table      = 'torneos';
    protected $primaryKey = 'id_torneo';
    protected $returnType = 'object';
    protected $allowedFields = ['id_torneo','estatus','id_categoria_equipo','nombre_torneo','fecha_inicio','fecha_fin','comentarios_torneo'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_actualizacion';
    protected $deletedField  = 'eliminacion';

    public function tabla_todos_los_torneos(){
        $detalles = $this->select("torneos.id_torneo,torneos.nombre_torneo,torneos.id_categoria_equipo,
                                    categorias_equipos.nombre_categoria")
                                    ->join("categorias_equipos","categorias_equipos.id_categoria_equipo =torneos.id_categoria_equipo")
                         ->FindAll();
        if($detalles != null){
            return $detalles;
        }
        else{
            return null;
        }
    }//end function detalles


}//end of model Usuario
