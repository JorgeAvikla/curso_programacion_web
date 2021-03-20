<?php namespace App\Controllers;
use App\Controllers\BaseController;

class Todos_los_jugadores extends BaseController{

	public function index(){
		$datos = array();
		$tabla_jugadores = new \App\Models\Tabla_jugadores;
		$datos['jugadores'] = $tabla_jugadores->tabla_todos_los_jugadores();
		if ($datos['jugadores']!=null) {
			// code...
			foreach ($datos['jugadores'] as $jugador) {
				$jugador->nombre_completo = $jugador->nombre.' '.$jugador->apellido_paterno.' '.$jugador->apellido_materno;
			}
		}
		$datos['navegacion'] = array(
			'tarea_principal' => "Jugadores",
			'tarea_activa' => "Todos",
		);
		return $this->crear_vista("todos_los_jugadores",$datos);
	}//end function index

	public function eliminar_jugador(){
		$id_jugador = $_POST['id_jugador'];
		$tabla_jugadores = new \App\Models\Tabla_jugadores;
		if ($tabla_jugadores->delete($id_jugador)) {
			echo json_encode(array('error'=>'0','data'=>'Eliminación correcta'));
		}
		else {
			echo json_encode(array('error'=>'1','data'=>'Error al eliminar jugador'));

		}
	}

	private function crear_vista($nombre_vista,$datos = null){
		$contenido['contenido'] = view($nombre_vista,$datos==null?array():$datos);
		$contenido['menu'] = crear_menu();
		return (validar_session() == false? redirect()->to(base_url("routing/".SIN_TAREA)):view("plantilla/sistema",$contenido));;
	}//end of function crear_vista
}//end class Dashboard
