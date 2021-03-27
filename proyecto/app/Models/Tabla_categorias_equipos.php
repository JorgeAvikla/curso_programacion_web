<?php namespace App\Models;

use CodeIgniter\Model;

class Tabla_categorias_equipos extends Model{
    protected $table      = 'categorias_equipos';
    protected $primaryKey = 'id_categoria_equipo';
    protected $returnType = 'object';
    protected $allowedFields = ['id_categoria_equipo','estatus','nombre_categoria'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_actualizacion';
    protected $deletedField  = 'eliminacion';

    public function tabla_todos_las_categorias(){
        $detalles = $this->select("categorias_equipos.id_categoria_equipo,categorias_equipos.nombre_categoria")
                         ->FindAll();
        if($detalles != null){
            return $detalles;
        }
        else{
            return null;
        }
    }//end function tabla_todos_las_categorias


}//end of model Usuario
