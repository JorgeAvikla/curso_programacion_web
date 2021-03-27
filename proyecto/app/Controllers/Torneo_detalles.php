<?php namespace App\Controllers;
use App\Controllers\BaseController;

class Torneo_detalles extends BaseController{

	public function index(){

		return $this->crear_vista("torneo_detalles",$this->cargar_datos());
	}//end function index

	public function cargar_datos(){
		$session = session();
		$datos = array();
		$tabla_torneos = new \App\Models\Tabla_torneos;
		$tabla_categorias_equipos = new \App\Models\Tabla_categorias_equipos;
		$datos['datos_torneo'] = $tabla_torneos->find($session->get('id_torneo_detalles'));
		$datos['datos_torneo']->categoria_torneo = $tabla_categorias_equipos->find($datos['datos_torneo']->id_categoria_equipo);

		$datos['categorias_equipos'] = $tabla_categorias_equipos->findAll();
		$datos['navegacion'] = array(
			'tarea_principal' => "Torneos",
			'tarea_activa' => "Detalles",
		);
		$tabla_equipos = new \App\Models\Tabla_equipos;
		$datos['equipos_en_torneo'] = $tabla_equipos->seleccionar_equipos_por_torneo($session->get('id_torneo_detalles'));
		$datos['equipos_disponibles'] = $tabla_equipos->seleccionar_equipos_por_categoria_juego($datos['datos_torneo']->categoria_torneo->id_categoria_equipo);

		if ($datos['equipos_disponibles'] != null) {
			foreach ($datos['equipos_disponibles'] as $id => $equipo) {
				if ($this->verificar_equipo_en_torneo($equipo->id_equipo,$session->get('id_torneo_detalles')) == TRUE) {
					unset($datos['equipos_disponibles'][$id]);
				}
			}
		}
		$datos['validation'] = $this->validator;
		$tabla_equipos_torneos = new \App\Models\Tabla_equipos_torneos;


		return $datos;
	}


	public function verificar_equipo_en_torneo($id_equipo,$id_torneo){
		$tabla_equipos_torneos = new \App\Models\Tabla_equipos_torneos;
		$bandera = $tabla_equipos_torneos->verificar_equipo_en_torneo($id_equipo,$id_torneo);
		if ($bandera == TRUE) {
			return TRUE;
		}
		else {
			return FALSE;
		}
	}

	public function editar_torneo(){
		$session = session();
		$id_torneo = $session->get('id_torneo_detalles');
		if ($this->validate($this->reglas())) {
			$tabla_torneos = new \App\Models\Tabla_torneos;
			$fecha_inicio = substr($this->request->getPost('fecha_torneo'),0,10);
			$fecha_fin = substr($this->request->getPost('fecha_torneo'),22,-9);
			$datos_torneo = array(
				'id_categoria_equipo' =>$this->request->getPost('id_categoria_equipo'),
				'nombre_torneo' =>$this->request->getPost('nombre_torneo'),
				'fecha_inicio' =>$fecha_inicio,
				'fecha_fin' =>$fecha_fin,
				'comentarios_torneo' =>$this->request->getPost('descripcion'),
			);
			if ($tabla_torneos->update($id_torneo,$datos_torneo)) {
				return redirect()->to(base_url("torneo_detalles"));
			}
			else {
				return $this->crear_vista("torneo_detalles",$this->cargar_datos());
			}
		}
		else {
			return $this->crear_vista("torneo_detalles",$this->cargar_datos());
		}

	}

	private function reglas(){
		$reglas = array(
			"nombre_torneo" => array(
				"rules"=>"required|min_length[2]|max_length[15]",
				"errors" => array(
					"required" => "El nombre es requerido.",
					"min_length" => "El nombre del torneo debe contener minimo 2 caracteres.",
					"max_length" => "El nombre del torneo debe contener máximo 15 caracteres.",
				)
			),
			"id_categoria_equipo" => array(
				"rules"=>"required",
				"errors" => array(
					"required" => "La categoría de equipo es obligatoría.",
				)
			),
			"fecha_torneo" => array(
				"rules"=>"required",
				"errors" => array(
					"required" => "Fecha requerida",
				)
			),
			"descripcion" => array(
				"rules"=>"required|min_length[1]|max_length[50]",
				"errors" => array(
					"required" => "La descripción es requerida.",
					"min_length" => "La descripción   debe contener  minimo 1 número.",
					"max_length" => "La descripción   debe contener  máximo 50 número.",
				)
			),
		);
		return $reglas;
	}

	public function guardar_equipos(){
		if ($this->validate($this->reglas_agregar_equipos())) {
			$session = session();
			$tabla_equipos_torneos = new \App\Models\Tabla_equipos_torneos;
			foreach ($this->request->getpost('id_equipos') as $id_equipo) {
				$data_equipo = array(
					'id_equipo' => $id_equipo,
					'id_torneo' => $session->get('id_torneo_detalles')
				);
				$tabla_equipos_torneos->insert($data_equipo);
				return redirect()->to(base_url("torneo_detalles"));

			}

		}
		else {
			return $this->crear_vista("torneo_detalles",$this->cargar_datos());


		}
	}

	private function reglas_agregar_equipos(){
		$reglas = array(
			"id_equipos" => array(
				"rules"=>"required",
				"errors" => array(
					"required" => "Seleccione un equipo",
				)
			),
		);
		return $reglas;
	}

	public function eliminar_equipo_torneo(){
		$session = session();
		$id_torneo = $session->get('id_torneo_detalles');
		$id_equipo= $_POST['id_equipo'];
		$tabla_equipos_torneos = new \App\Models\Tabla_equipos_torneos;
		$tabla_equipos_torneos->eliminar_equipo_torneo($id_equipo,$id_torneo);

		echo json_encode(array('error'=>'0','data'=>'Eliminación correcta'));
	}

	private function crear_vista($nombre_vista,$datos = null){
		$contenido['contenido'] = view($nombre_vista,$datos==null?array():$datos);
		$contenido['menu'] = crear_menu();
		return (validar_session() == false? redirect()->to(base_url("routing/".SIN_TAREA)):view("plantilla/sistema",$contenido));;
	}//end of function crear_vista
}//end class Dashboard
