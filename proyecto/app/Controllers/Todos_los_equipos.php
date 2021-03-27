<?php namespace App\Controllers;
use App\Controllers\BaseController;

class Todos_los_equipos extends BaseController{

	public function index(){
		$datos = array();
		$tabla_equipos = new \App\Models\Tabla_equipos;
		$datos['equipos'] = $tabla_equipos->tabla_todos_los_equipos();

		$datos['navegacion'] = array(
			'tarea_principal' => "Equipos",
			'tarea_activa' => "Todos",
		);
		return $this->crear_vista("todos_los_equipos",$datos);
	}//end function index

	public function eliminar_equipo(){
		$id_equipo = $_POST['id_equipo'];
		$tabla_equipos = new \App\Models\Tabla_equipos;
		if ($tabla_equipos->delete($id_equipo)) {
			echo json_encode(array('error'=>'0','data'=>'Eliminación correcta'));
		}
		else {
			echo json_encode(array('error'=>'1','data'=>'Error al eliminar equipo'));

		}
	}

	private function crear_vista($nombre_vista,$datos = null){
		$contenido['contenido'] = view($nombre_vista,$datos==null?array():$datos);
		$contenido['menu'] = crear_menu();
		return (validar_session() == false? redirect()->to(base_url("routing/".SIN_TAREA)):view("plantilla/sistema",$contenido));;
	}//end of function crear_vista
}//end class Dashboard
