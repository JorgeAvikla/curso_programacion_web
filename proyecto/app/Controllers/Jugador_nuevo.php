<?php namespace App\Controllers;
use App\Controllers\BaseController;

class Jugador_nuevo extends BaseController{

	public function index(){
		return $this->crear_vista("jugador_nuevo",$this->cargar_datos());
	}//end function index

	public function cargar_datos(){
		$datos = array();
		$tabla_equipos = new \App\Models\Tabla_equipos;
		$datos['equipos'] = $tabla_equipos->findAll();
		$datos['navegacion'] = array(
			'tarea_principal' => "Jugadores",
			'tarea_activa' => "Nuevo",
		);
		$datos['validation'] = $this->validator;

		return $datos;
	}

	public function registrar_jugador(){
		$imagen = $this->request->getFile('foto_jugador');
		if ($this->validate($this->reglas())) {
			$nombre_imagen = $imagen->getRandomName();
			$tabla_jugadores = new \App\Models\Tabla_jugadores;
			$fecha = explode('/', $this->request->getPost('fecha_nacimiento'));
			$fecha_nueva = $fecha['2'].'-'.$fecha['0'].'-'.$fecha['1'];
			$datos_jugador = array(
				'nombre' =>$this->request->getPost('nombre'),
				'apellido_paterno' =>$this->request->getPost('apellido_paterno'),
				'apellido_materno' =>$this->request->getPost('apellido_materno'),
				'edad' =>$this->request->getPost('edad'),
				'estatura' =>$this->request->getPost('estatura'),
				'sexo' =>$this->request->getPost('sexo'),
				'numero' =>$this->request->getPost('numero'),
				'posicion' =>$this->request->getPost('posicion'),
				'id_equipo' =>$this->request->getPost('id_equipo'),
				'foto_jugador' =>$nombre_imagen,
				'fecha_nacimiento' =>$fecha_nueva
			);
			if ($tabla_jugadores->insert($datos_jugador)) {
				$imagen->move('./recursos_sistema/fotos_jugadores',$nombre_imagen);
				mensaje('Jugador registrado correctamente',ALERTA_DE_EXITO);
				return redirect()->to(base_url("jugador_nuevo"));
			}
			else {
				mensaje('Error al registrar el jugador',ALERTA_DE_ERROR);
				return $this->crear_vista("jugador_nuevo",$this->cargar_datos());
			}
		}
		else {
			mensaje('Error al registrar el jugador',ALERTA_DE_ERROR);
			return $this->crear_vista("jugador_nuevo",$this->cargar_datos());
		}

	}

	private function reglas(){
		$reglas = array(
			"nombre" => array(
				"rules"=>"required|min_length[2]|max_length[15]",
				"errors" => array(
					"required" => "El nombre es requerido.",
					"min_length" => "El nombre debe contener minimo 2 caracteres.",
					"max_length" => "El nombre debe contener máximo 15 caracteres.",
				)
			),
			"apellido_paterno" => array(
				"rules"=>"required|min_length[2]|max_length[15]",
				"errors" => array(
					"required" => "El apellido paterno es requerido.",
					"min_length" => "El apellido paterno debe contener  minimo 2 caracteres.",
					"max_length" => "El apellido paterno debe contener  máximo 15 caracteres.",
				)
			),
			"apellido_materno" => array(
				"rules"=>"required|min_length[2]|max_length[15]",
				"errors" => array(
					"required" => "El apellido materno es requerido.",
					"min_length" => "El apellido materno debe contener  minimo 2 caracteres.",
					"max_length" => "El apellido materno debe contener  máximo 15 caracteres.",
				)
			),
			"edad" => array(
				"rules"=>"required|min_length[1]|max_length[2]|numeric",
				"errors" => array(
					"required" => "La edad es requerida.",
					"min_length" => "La edad   debe contener  minimo 1 número.",
					"max_length" => "La edad   debe contener  máximo 2 número.",
					"numeric" => "La edad debe ser un número.",
				)
			),
			"estatura" => array(
				"rules"=>"required|min_length[1]|max_length[3]|numeric",
				"errors" => array(
					"required" => "La estatura es requerida.",
					"min_length" => "La estatura   debe contener  minimo 1 número.",
					"max_length" => "La estatura   debe contener  máximo 3 número.",
					"numeric" => "La estatura debe ser un número.",
				)
			),

			"sexo" => array(
				"rules"=>"required",
				"errors" => array(
					"required" => "El sexo es requerido.",
				)
			),
			"fecha_nacimiento" => array(
				"rules"=>"required",
				"errors" => array(
					"required" => "Fecha de nacimiento requerida.",
				)
			),

			"id_equipo" => array(
				"rules"=>"required",
				"errors" => array(
					"required" => "El equipo es requerido.",
				)
			),

			"posicion" => array(
				"rules"=>"required|min_length[2]|max_length[20]",
				"errors" => array(
					"required" => "La posición es requerida.",
					"min_length" => "La posición debe contener minimo 2 caracteres.",
					"max_length" => "La posición debe contener máximo 20 caracteres.",
				)
			),

			"numero" => array(
				"rules"=>"required|min_length[1]|max_length[5]|numeric",
				"errors" => array(
					"required" => "El numero de juego es requerido.",
					"min_length" => "El numero de juego debe contener minimo 2 caracteres.",
					"max_length" => "El numero de juego debe contener máximo 20 caracteres.",
					"numeric" => "Ingrese un número valido.",
				)
			),

			"foto_jugador" => array(
				'rules' => 'uploaded[foto_jugador]|mime_in[foto_jugador,image/jpg,image/jpeg,image/png]|max_size[foto_jugador,5120]',
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
