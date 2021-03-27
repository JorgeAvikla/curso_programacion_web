<?php namespace App\Controllers;
use App\Controllers\BaseController;

class Equipo_detalles extends BaseController{

	public function index(){

		return $this->crear_vista("equipo_detalles",$this->cargar_datos());
	}//end function index

	public function cargar_datos(){
		$session = session();
		$datos = array();
		$tabla_equipos = new \App\Models\Tabla_equipos;
		$tabla_categorias_equipos = new \App\Models\Tabla_categorias_equipos;
		$datos['datos_equipo'] = $tabla_equipos->find($session->get('id_equipo_detalles'));
		$datos['datos_equipo']->categoria_equipo = $tabla_categorias_equipos->find($datos['datos_equipo']->id_categoria_equipo);

		$datos['categorias_equipos'] = $tabla_categorias_equipos->findAll();
		$datos['navegacion'] = array(
			'tarea_principal' => "Equipos",
			'tarea_activa' => "Detalles",
		);
		$datos['validation'] = $this->validator;

		$Tabla_jugadores = new \App\Models\Tabla_jugadores;
		$datos['jugadores'] = $Tabla_jugadores->seleccionar_jugadores_por_equipo($session->get('id_equipo_detalles'));
		return $datos;
	}

	public function editar_equipo(){
		$session = session();
		$id_equipo = $session->get('id_equipo_detalles');
		if ($this->validate($this->reglas())) {
			$tabla_equipos = new \App\Models\Tabla_equipos;

			$dato_equipo = array(
				'nombre_equipo' =>$this->request->getPost('nombre_equipo'),
				'id_categoria_equipo' =>$this->request->getPost('id_categoria_equipo'),
			);
			if ($tabla_equipos->update($id_equipo,$dato_equipo)) {
				return redirect()->to(base_url("equipo_detalles"));
			}
			else {
				return $this->crear_vista("equipo_detalles",$this->cargar_datos());
			}
		}
		else {
			return $this->crear_vista("equipo_detalles",$this->cargar_datos());
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

		);
		return $reglas;
	}

	public function actualizar_imagen_equipo(){
		$session = session();
		$id_equipo = $session->get('id_equipo_detalles');
		$imagen = $this->request->getFile('imagen_equipo');
		if ($this->validate($this->reglas_fotografia())) {
			$nombre_imagen = $imagen->getRandomName();
			$tabla_equipos = new \App\Models\Tabla_equipos;
			$datos_jugador = array(
				'logo_equipo' =>$nombre_imagen,
			);
			if ($tabla_equipos->update($id_equipo,$datos_jugador)) {
				$imagen->move('./recursos_sistema/logos_equipos',$nombre_imagen);
				return redirect()->to(base_url("equipo_detalles"));
			}
			else {
				return $this->crear_vista("equipo_detalles",$this->cargar_datos());
			}
		}
		else {
			return $this->crear_vista("equipo_detalles",$this->cargar_datos());
		}

	}

	private function reglas_fotografia(){
		$reglas = array(

			"imagen_equipo" => array(
				'rules' => 'uploaded[imagen_equipo]|mime_in[imagen_equipo,image/jpg,image/jpeg,image/png]|max_size[imagen_equipo,5120]',
				"errors" => array(
					'uploaded' => 'Debe seleccionar una imagen',
					'mime_in' => 'Formato de imagen no permitido',
					'max_size' => 'Debe ingresar una imagen menor a 2 MB'
				)
			),
		);
		return $reglas;
	}

	private function crear_vista($nombre_vista,$datos = null){
		$contenido['contenido'] = view($nombre_vista,$datos==null?array():$datos);
		$contenido['menu'] = crear_menu();
		return (validar_session() == false? redirect()->to(base_url("routing/".SIN_TAREA)):view("plantilla/sistema",$contenido));;
	}//end of function crear_vista
}//end class Dashboard
