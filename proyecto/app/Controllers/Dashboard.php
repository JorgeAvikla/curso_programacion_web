<?php namespace App\Controllers;
use App\Controllers\BaseController;

class Dashboard extends BaseController{

	public function index(){
		$datos = array();
		$datos['navegacion'] = array(
			'tarea_principal' => "Dashboard",
		);
		return $this->crear_vista("dashboard",$datos);
	}//end function index

	private function crear_vista($nombre_vista,$datos = null){
		$contenido['contenido'] = view($nombre_vista,$datos==null?array():$datos);
		// $contenido['menu'] = crear_menu();
		return (validar_session() == false? redirect()->to(base_url("routing/".SIN_TAREA)):view("plantilla/sistema",$contenido));;
	}//end of function crear_vista

}//end class Dashboard
