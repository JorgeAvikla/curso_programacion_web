<?php namespace App\Controllers;
use App\Controllers\BaseController;

class Equipo_nuevo extends BaseController{

	public function index(){

		return $this->crear_vista("equipo_nuevo",$this->cargar_datos());
	}//end function index

	public function cargar_datos(){
		$datos = array();
		$tabla_categorias_equipos = new \App\Models\Tabla_categorias_equipos;
		$datos['categorias_equipos'] = $tabla_categorias_equipos->findAll();
		$datos['navegacion'] = array(
			'tarea_principal' => "Equipos",
			'tarea_activa' => "Nuevo",
		);
		$datos['validation'] = $this->validator;

		return $datos;
	}
	public function registrar_equipo(){
		$imagen = $this->request->getFile('imagen_equipo');

		if ($this->validate($this->reglas())) {
			$nombre_imagen = $imagen->getRandomName();
			$tabla_equipos = new \App\Models\Tabla_equipos;
			$datos_equipo = array(
				'nombre_equipo' =>$this->request->getPost('nombre_equipo'),
				'id_categoria_equipo' =>$this->request->getPost('id_categoria_equipo'),
				'logo_equipo' =>$nombre_imagen,
			);
			if ($tabla_equipos->insert($datos_equipo)) {
				$imagen->move('./recursos_sistema/logos_equipos',$nombre_imagen);
				mensaje('Equipo creado correctamente',ALERTA_DE_EXITO);
				return redirect()->to(base_url("equipo_nuevo"));
			}
			else {
				return $this->crear_vista("equipo_nuevo",$this->cargar_datos());
			}
		}
		else {
			return $this->crear_vista("equipo_nuevo",$this->cargar_datos());
		}
	}

	private function reglas(){
		$reglas = array(
			"nombre_equipo" => array(
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

			"imagen_equipo" => array(
				'rules' => 'uploaded[imagen_equipo]|mime_in[imagen_equipo,image/jpg,image/jpeg,image/png]|max_size[imagen_equipo,5120]',
				"errors" => array(
					'uploaded' => 'Debe seleccionar una imagen',
					'mime_in' => 'Formato de imagen no permitido',
					'max_size' => 'Debe ingresar una imagen menor a 5 MB'
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
