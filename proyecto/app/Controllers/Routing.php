<?php namespace App\Controllers;

class Routing extends BaseController{
	public function index($tarea = null,$id_editar =null){
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

				case TAREA_JUGADOR_NUEVO:
	        		return redirect()->to(base_url("jugador_nuevo"));
	        		break;

				case TAREA_JUGADORES_TODOS:
					return redirect()->to(base_url("todos_los_jugadores"));
					break;

				case TAREA_JUGADOR_DETALLES:
					$session= session();
					$session->set('id_jugador_detalles',$id_editar);
            		return redirect()->to(base_url("jugador_detalles"));
	            		break;

				case TAREA_TORNEOS_TODOS:
            		return redirect()->to(base_url("todos_los_torneos"));
            		break;

				case TAREA_TORNEO_NUEVO:
            		return redirect()->to(base_url("torneo_nuevo"));
            		break;

				case TAREA_TORNEO_DETALLES:
				$session= session();
				$session->set('id_torneo_detalles',$id_editar);
            		return redirect()->to(base_url("torneo_detalles"));
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
