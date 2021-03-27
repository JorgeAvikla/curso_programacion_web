<?php namespace App\Controllers;
use App\Controllers\BaseController;

class Torneo_nuevo extends BaseController{

	public function index(){

		return $this->crear_vista("torneo_nuevo",$this->cargar_datos());
	}//end function index

	public function cargar_datos(){
		$datos = array();
		$tabla_categorias_equipos = new \App\Models\Tabla_categorias_equipos;
		$datos['categorias_equipos'] = $tabla_categorias_equipos->findAll();
		$datos['navegacion'] = array(
			'tarea_principal' => "Torneos",
			'tarea_activa' => "Nuevo",
		);
		$datos['validation'] = $this->validator;

		return $datos;
	}

	public function registrar_torneo(){

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
			// dd($datos_equipo);
			if ($tabla_torneos->insert($datos_torneo)) {
				mensaje('Torneo creado correctamente',ALERTA_DE_EXITO);
				return redirect()->to(base_url("torneo_nuevo"));
			}
			else {
				return $this->crear_vista("torneo_nuevo",$this->cargar_datos());
			}
		}
		else {
			return $this->crear_vista("torneo_nuevo",$this->cargar_datos());
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
					"min_length" => "La descripción   debe contener  minimo 1 caracteres.",
					"max_length" => "La descripción   debe contener  máximo 50 caracteres.",
				)
			),
		);
		return $reglas;
	}

	// private function reglas_formulario_imagen() {
	// 	return [
	// 		'foto_jugador' => [
	// 			'rules' => 'uploaded[foto_jugador]|mime_in[foto_jugador,image/jpg,image/jpeg,image/png]|max_size[foto_jugador,5120]',
	// 			'errors' => [
	// 				'uploaded' => 'Debe seleccionar una imagen',
	// 				'mime_in' => 'Formato de imagen no permitido',
	// 				'max_size' => 'Debe ingresar una imagen menor a 2 MB'
	// 			]
	// 		]
	// 	];
	// }//end reglas_formulario_imagen

	private function crear_vista($nombre_vista,$datos = null){
		$contenido['contenido'] = view($nombre_vista,$datos==null?array():$datos);
		$contenido['menu'] = crear_menu();
		return (validar_session() == false? redirect()->to(base_url("routing/".SIN_TAREA)):view("plantilla/sistema",$contenido));;
	}//end of function crear_vista
}//end class Dashboard
