<?php namespace App\Controllers;

class Login extends BaseController{
	public function index(){
		$data= array();
		return $this->crear_vista('login',$data);
	}//end of class Routing

	public function verificar_acceso(){
		if($this->validate($this->reglas())){
			$correo = $this->request->getPost("correo");
			$contrasena = $this->request->getPost("contrasenia");
			$tabla_usuarios = new \App\Models\Tabla_usuarios;
			$usuario = $tabla_usuarios->login($correo,hash("sha256",$contrasena));

			if($usuario != null){
				$session = session();
				$session->set("id_usuario",$usuario->id_usuario);
				$session->set("nombre",$usuario->nombre);
				$session->set("correo",$usuario->correo);
				$session->set("iniciada",TRUE);
				mensaje('Hola, '.$usuario->nombre.' bienvenido',ALERTA_DE_EXITO);
				return redirect()->to(base_url("routing/".TAREA_DASHBOARD));

			}
			else{
				$data = array();
				mensaje('Los datos son  incorrectos',ALERTA_DE_ERROR);
				return $this->crear_vista("login",$data);
			}
		}
		else {
			$data['validation'] = $this->validator;
			return $this->crear_vista("login",$data);
		}


	}//end of function login

	private function reglas(){
		$reglas = array(
			"correo" => array(
				"rules"=>"required|valid_email",
				"errors" => array(
					"required" => "El correo es requerido.",
					"valid_email" => "Ingrese un correo valido.",
				)
			),
			"contrasenia" => array(
				"rules"=>"required",
				"errors" => array(
					"required" => "La contraseña es requerida."
				)
			)
		);
		return $reglas;
	}//end function reglas


	private function crear_vista($nombre_vista,$data=null){
		$contenido['contenido'] = view($nombre_vista,$data);
		return view("plantilla/login",$contenido);
	}//end of function crear_vista

}//end of class Routing
