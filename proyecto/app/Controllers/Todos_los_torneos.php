<?php namespace App\Controllers;
use App\Controllers\BaseController;

class Todos_los_torneos extends BaseController{

	public function index(){
		$datos = array();
		$tabla_torneos = new \App\Models\Tabla_torneos;
		$datos['torneos'] = $tabla_torneos->tabla_todos_los_torneos();

		$datos['navegacion'] = array(
			'tarea_principal' => "Torneos",
			'tarea_activa' => "Todos",
		);
		return $this->crear_vista("todos_los_torneos",$datos);
	}//end function index

	public function eliminar_torneo(){
		$id_torneo = $_POST['id_torneo'];
		$tabla_torneos = new \App\Models\Tabla_torneos;
		if ($tabla_torneos->delete($id_torneo)) {
			echo json_encode(array('error'=>'0','data'=>'Eliminación correcta'));
		}
		else {
			echo json_encode(array('error'=>'1','data'=>'Error al eliminar torneo'));

		}
	}

	private function crear_vista($nombre_vista,$datos = null){
		$contenido['contenido'] = view($nombre_vista,$datos==null?array():$datos);
		$contenido['menu'] = crear_menu();
		return (validar_session() == false? redirect()->to(base_url("routing/".SIN_TAREA)):view("plantilla/sistema",$contenido));;
	}//end of function crear_vista
}//end class Dashboard
