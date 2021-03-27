<?php namespace App\Models;

use CodeIgniter\Model;

class Tabla_equipos extends Model{
    protected $table      = 'equipos';
    protected $primaryKey = 'id_equipo';
    protected $returnType = 'object';
    protected $allowedFields = ['id_equipo','estatus','nombre_equipo','id_categoria_equipo','logo_equipo'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_actualizacion';
    protected $deletedField  = 'eliminacion';

    public function tabla_todos_los_equipos(){
        $detalles = $this->select("equipos.id_equipo,equipos.nombre_equipo,equipos.id_categoria_equipo,equipos.logo_equipo,
                                    categorias_equipos.nombre_categoria")
                                    ->join("categorias_equipos","categorias_equipos.id_categoria_equipo =equipos.id_categoria_equipo")
                         ->FindAll();
        if($detalles != null){
            return $detalles;
        }
        else{
            return null;
        }
    }//end function tabla_todos_los_equipos

    public function tabla_datos_equipo($id_equipo){
        $detalles = $this->select("equipos.nombre_equipo")
                        ->where('equipos.id_equipo',$id_equipo)
                         ->Find();
        if($detalles != null){
            return $detalles;
        }
        else{
            return null;
        }
    }//end function tabla_datos_equipo

    public function seleccionar_equipos_por_torneo($id_del_torneo){
        $equipos = $this->select('equipos.id_equipo, equipos.nombre_equipo, equipos.logo_equipo')
                        ->join("equipos_torneos","equipos_torneos.id_equipo =equipos.id_equipo")
                        ->where('equipos_torneos.id_torneo',$id_del_torneo)
                        ->findAll();
        if ($equipos != null) {
            return $equipos;
        }
        else {
            return null;
        }
    }

    public function seleccionar_equipos_por_categoria_juego($id_categoira_equipo){
        $equipos = $this->select('equipos.id_equipo,equipos.nombre_equipo')
                        ->where('equipos.id_categoria_equipo',$id_categoira_equipo)
                        ->findAll();
        if ($equipos != null) {
            return $equipos;
        }
        else {
            return null;
        }
    }

}//end of model Usuario
