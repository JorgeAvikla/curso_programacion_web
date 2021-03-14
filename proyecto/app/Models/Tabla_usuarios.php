<?php namespace App\Models;

use CodeIgniter\Model;

class Tabla_usuarios extends Model{
    protected $table      = 'usuarios';
    protected $primaryKey = 'id_usuario';
    protected $returnType = 'object';
    protected $allowedFields = ['id_usuario','nombre','correo','contrasenia'];
    protected $useTimestamps = true;
    protected $useSoftDeletes = true;
    protected $createdField  = 'fecha_creacion';
    protected $updatedField  = 'fecha_actualizacion';
    protected $deletedField  = 'estatus';


    public function login($correo,$contrasena){
        $resultado = $this->where("correo",$correo)
                        ->where("contrasenia",$contrasena)
                        ->first();
        if($resultado != null){
            return $resultado;
        }//end of if
        else{
            return null;
        }//end of else

    }//end function login


}//end of model Usuario
