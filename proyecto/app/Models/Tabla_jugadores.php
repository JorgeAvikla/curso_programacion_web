<?php namespace App\Models;

use CodeIgniter\Model;

class Tabla_jugadores extends Model{
    protected $table      = 'jugadores';
    protected $primaryKey = 'id_jugador';
    protected $returnType = 'object';
    protected $allowedFields = ['id_jugador','estatus','nombre','apellido_paterno','apellido_materno','edad','estatura','sexo','numero','posicion','id_equipo','foto_jugador','fecha_nacimiento'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_actualizacion';
    protected $deletedField  = 'eliminacion';

    public function tabla_todos_los_jugadores(){
        $detalles = $this->select("jugadores.id_jugador,jugadores.nombre,jugadores.apellido_paterno,jugadores.apellido_materno,jugadores.id_equipo,
                                    equipos.nombre_equipo, categorias_equipos.nombre_categoria")
                                    ->join("equipos","equipos.id_equipo =jugadores.id_equipo")
                                    ->join("categorias_equipos","categorias_equipos.id_categoria_equipo =equipos.id_categoria_equipo")
                         ->FindAll();
        if($detalles != null){
            return $detalles;
        }
        else{
            return null;
        }
    }//end function tabla_todos_los_jugadores

    public function seleccionar_jugadores_por_equipo($id_equipo){
        $detalles = $this->select("jugadores.id_jugador,concat(jugadores.nombre, ' ', jugadores.apellido_paterno,' ',jugadores.apellido_materno ) as nombre_jugador,jugadores.numero, jugadores.posicion")
                                    ->where('id_equipo', $id_equipo)
                         ->FindAll();
        if($detalles != null){
            return $detalles;
        }
        else{
            return null;
        }
    }//end function detalles




}//end of model Usuario
