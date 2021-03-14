<?php namespace App\Controllers;

class Routing extends BaseController{
	public function index($tarea = null){
		$session = session();
		$session->tarea_actual = $tarea == NULL ? SIN_TAREA : $tarea;
        if($session->get("iniciada") != null){
            switch ($session->tarea_actual) {
            	case TAREA_DASHBOARD:
            		return redirect()->to(base_url("dashboard"));
            		break;

				case TAREA_LOGOUT:
					session()->destroy();
					return redirect()->to(base_url());
					break;

            	default:
            		return redirect()->to(base_url("dashboard"));
            		break;
            }
        }//end of if
        else{
            switch ($tarea) {
                case TAREA_LOGIN:
                    return redirect()->to(base_url("login"));
                    break;

                default:
				return redirect()->to(base_url("login"));
                    break;
            }//end of switch
        }//end of else
	}//end of function index
}//end of class Routing
