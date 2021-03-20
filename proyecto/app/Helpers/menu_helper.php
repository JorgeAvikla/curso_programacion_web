<?php

function configurar_menu(){
    $menu = array();
    $session = session();

    $menu_item = array();
    $menu_item['isActive'] = false;
    $menu_item['href'] = base_url('routing/'.TAREA_DASHBOARD);
    $menu_item['icon'] = 'fa fa-tachometer-alt';
    $menu_item['text'] = 'Dasboard';
    $menu_item['subMenu'] = array();
    $menu['dashboard'] = $menu_item;

    $menu_item = array();
    $menu_item['isActive'] = false;
    $menu_item['href'] = "#";
    $menu_item['icon'] = 'fas fa-running';
    $menu_item['text'] = 'Jugadores';
    $menu_item['subMenu'] = array();

        $sub_menu_item = array();
        $sub_menu_item['isActive'] = false;
        $sub_menu_item['href'] = base_url('routing/'.TAREA_JUGADORES_TODOS);
        $sub_menu_item['text'] = 'Todos';
        $menu_item['subMenu']['todos'] = $sub_menu_item;

        $sub_menu_item = array();
        $sub_menu_item['isActive'] = false;
        $sub_menu_item['href'] = base_url('routing/'.TAREA_JUGADOR_NUEVO);
        $sub_menu_item['text'] = 'Nuevo';
        $menu_item['subMenu']['nuevo'] = $sub_menu_item;

    $menu['jugadores'] = $menu_item;

    $menu_item = array();
    $menu_item['isActive'] = false;
    $menu_item['href'] = "#";
    $menu_item['icon'] = 'fas fa-trophy';
    $menu_item['text'] = 'Torneos';
    $menu_item['subMenu'] = array();

        $sub_menu_item = array();
        $sub_menu_item['isActive'] = false;
        $sub_menu_item['href'] = base_url('routing/'.TAREA_TORNEOS_TODOS);
        $sub_menu_item['text'] = 'Todos';
        $menu_item['subMenu']['todos'] = $sub_menu_item;

        $sub_menu_item = array();
        $sub_menu_item['isActive'] = false;
        $sub_menu_item['href'] = base_url('routing/'.TAREA_TORNEO_NUEVO);
        $sub_menu_item['text'] = 'Nuevo';
        $menu_item['subMenu']['nuevo'] = $sub_menu_item;

    $menu['torneos'] = $menu_item;

    $menu_item = array();
    $menu_item['isActive'] = false;
    $menu_item['href'] = "#";
    $menu_item['icon'] = 'fas fa-shield-alt';
    $menu_item['text'] = 'Equipos';
    $menu_item['subMenu'] = array();

        $sub_menu_item = array();
        $sub_menu_item['isActive'] = false;
        $sub_menu_item['href'] = base_url('routing/'.TAREA_EQUIPOS_TODOS);
        $sub_menu_item['text'] = 'Todos';
        $menu_item['subMenu']['todos'] = $sub_menu_item;

        $sub_menu_item = array();
        $sub_menu_item['isActive'] = false;
        $sub_menu_item['href'] = base_url('routing/'.TAREA_EQUIPO_NUEVO);
        $sub_menu_item['text'] = 'Nuevo';
        $menu_item['subMenu']['nuevo'] = $sub_menu_item;

    $menu['equipos'] = $menu_item;

    $menu_item = array();
    $menu_item['isActive'] = false;
    $menu_item['href'] = "#";
    $menu_item['icon'] = 'fas fa-list';
    $menu_item['text'] = 'Partidos';
    $menu_item['subMenu'] = array();

        $sub_menu_item = array();
        $sub_menu_item['isActive'] = false;
        $sub_menu_item['href'] = base_url('routing/'.TAREA_PARTIDOS_TODOS);
        $sub_menu_item['text'] = 'Todos';
        $menu_item['subMenu']['todos'] = $sub_menu_item;

        $sub_menu_item = array();
        $sub_menu_item['isActive'] = false;
        $sub_menu_item['href'] = base_url('routing/'.TAREA_PARTIDO_NUEVO);
        $sub_menu_item['text'] = 'Nuevo';
        $menu_item['subMenu']['nuevos'] = $sub_menu_item;

        $sub_menu_item = array();
        $sub_menu_item['isActive'] = false;
        $sub_menu_item['href'] = base_url('routing/'.TAREA_RESULTADOS_PARTIDOS);
        $sub_menu_item['text'] = 'Resultados';
        $menu_item['subMenu']['resultados'] = $sub_menu_item;

    $menu['partidos'] = $menu_item;

    $menu_item = array();
    $menu_item['isActive'] = false;
    $menu_item['href'] = "#";
    $menu_item['icon'] = 'fas fa-clipboard-list';
    $menu_item['text'] = 'Categorías equipos';
    $menu_item['subMenu'] = array();

        $sub_menu_item = array();
        $sub_menu_item['isActive'] = false;
        $sub_menu_item['href'] = base_url('routing/'.TAREA_CATEGORIAS_TODAS);
        $sub_menu_item['text'] = 'Todas';
        $menu_item['subMenu']['todos'] = $sub_menu_item;

        $sub_menu_item = array();
        $sub_menu_item['isActive'] = false;
        $sub_menu_item['href'] = base_url('routing/'.TAREA_CATEGORIA_NUEVA);
        $sub_menu_item['text'] = 'Nueva';
        $menu_item['subMenu']['nuevos'] = $sub_menu_item;

    $menu['categorías_equipos'] = $menu_item;

    $menu_item = array();
    $menu_item['isActive'] = false;
    $menu_item['href'] = "#";
    $menu_item['icon'] = 'fas fa-microchip';
    $menu_item['text'] = 'Tarjetas';
    $menu_item['subMenu'] = array();

        $sub_menu_item = array();
        $sub_menu_item['isActive'] = false;
        $sub_menu_item['href'] = base_url('routing/'.TAREA_TIPOS_TARJETAS_TODAS);
        $sub_menu_item['text'] = 'Todas';
        $menu_item['subMenu']['todos'] = $sub_menu_item;

        $sub_menu_item = array();
        $sub_menu_item['isActive'] = false;
        $sub_menu_item['href'] = base_url('routing/'.TAREA_TIPOS_TARJETA_NUEVA);
        $sub_menu_item['text'] = 'Nueva';
        $menu_item['subMenu']['nuevos'] = $sub_menu_item;

    $menu['tarjetas'] = $menu_item;



    return $menu;

}//end function crear_menu

function activar_menu_item($menu){
    $session = session();
    $tarea_actual = $session->tarea_actual;
    if($tarea_actual == TAREA_DASHBOARD){
        $menu['dashboard']['isActive'] = TRUE;
    }//end if tarea Dashboard

    if($tarea_actual == TAREA_JUGADORES_TODOS){
        $menu['jugadores']['isActive'] = TRUE;
        $menu['jugadores']['subMenu']['todos']['isActive'] = TRUE;
    }//end if tarea TAREA_JUGADORES_TODOS

    if($tarea_actual == TAREA_JUGADOR_DETALLES){
        $menu['jugadores']['isActive'] = TRUE;
    }//end if tarea TAREA_JUGADORES_TODOS

    if($tarea_actual == TAREA_JUGADOR_NUEVO){
        $menu['jugadores']['isActive'] = TRUE;
        $menu['jugadores']['subMenu']['nuevo']['isActive'] = TRUE;

    }//end if tarea TAREA_JUGADORES_TODOS

    if($tarea_actual == TAREA_EQUIPOS_TODOS){
        $menu['equipos']['isActive'] = TRUE;
        $menu['equipos']['subMenu']['todos']['isActive'] = TRUE;
    }//end if tarea TAREA_EQUIPOS_TODOS

    if($tarea_actual == TAREA_EQUIPO_NUEVO){
        $menu['equipos']['isActive'] = TRUE;
        $menu['equipos']['subMenu']['nuevo']['isActive'] = TRUE;
    }//end if tarea TAREA_EQUIPOS_TODOS

    if($tarea_actual == TAREA_EQUIPO_DETALLES){
        $menu['equipos']['isActive'] = TRUE;
    }//end if tarea TAREA_EQUIPOS_TODOS


    if($tarea_actual == TAREA_TORNEOS_TODOS){
        $menu['torneos']['isActive'] = TRUE;
        $menu['torneos']['subMenu']['todos']['isActive'] = TRUE;
    }//end if tarea TAREA_TORNEOS_TODOS

    if($tarea_actual == TAREA_TORNEO_NUEVO){
        $menu['torneos']['isActive'] = TRUE;
        $menu['torneos']['subMenu']['nuevo']['isActive'] = TRUE;
    }//end if tarea TAREA_TORNEOS_TODOS
    if($tarea_actual == TAREA_TORNEO_DETALLES){
        $menu['torneos']['isActive'] = TRUE;
    }//end if tarea TAREA_TORNEOS_TODOS

    if($tarea_actual == TAREA_PARTIDOS_TODOS){
        $menu['partidos']['isActive'] = TRUE;
        $menu['partidos']['subMenu']['todos']['isActive'] = TRUE;
    }//end if tarea TAREA_PARTIDOS_TODOS

    if($tarea_actual == TAREA_CATEGORIAS_TODAS){
        $menu['categorías_equipos']['isActive'] = TRUE;
        $menu['categorías_equipos']['subMenu']['todos']['isActive'] = TRUE;
    }//end if tarea TAREA_PARTIDOS_TODOS

    if($tarea_actual == TAREA_TIPOS_TARJETAS_TODAS){
        $menu['tarjetas']['isActive'] = TRUE;
        $menu['tarjetas']['subMenu']['todos']['isActive'] = TRUE;
    }//end if tarea TAREA_PARTIDOS_TODOS


    return $menu;
}//end function activar_menu_item

function crear_menu(){
    $menu = configurar_menu();
    $menu = activar_menu_item($menu);
    $html = '';
    foreach ($menu as $menu_item) {
        if($menu_item['href'] != '#'){
            $html .= '<li class=" nav-item">';
            $html .= '<a href="'.$menu_item['href'].'" class="nav-link '.(($menu_item['isActive'])?' active':'').'">
            <i class="nav-icon '.$menu_item['icon'].'"></i>
                <p>
                    '.$menu_item['text'].'
                    <span class="right fas fa-angle-right"></span>
                </p>
            </a>';
        }
        else{
            $html .= '<li class="nav-item '.(($menu_item['isActive'])?' menu-open':'').'"">';
            $html .= '
            <a class="nav-link '.(($menu_item['isActive'])?' active':'').'" href="#">
                <i class="'.$menu_item['icon'].' nav-icon"></i>
                <p>
                    '.$menu_item['text'].'
                    <span class="right fas fa-angle-left"></span>
                </p>
            </a>';
        }
        if(sizeof($menu_item['subMenu'])>0){
            $html .= '<ul class="nav nav-treeview">';
            foreach ($menu_item['subMenu'] as $subMenuItem) {
                $html .= '<li class=" nav-item">';
                if($subMenuItem['href'] != "#"){
                    $html .= '
                    <a  class=" nav-link '.(($subMenuItem['isActive'])?'active':'').'" href="'.$subMenuItem['href'].'">
                        <p>
                            <i class="far fa-circle nav-icon"></i>
                            '.$subMenuItem['text'].'
                        </p>
                    </a>';
                }
                else{
                    $html .= '
                    <a class="has-arrow" href="'.$subMenuItem['href'].'">
                        <p>
                            <i class="far fa-circle nav-icon"></i>
                            '.$subMenuItem['text'].'
                        </p>
                    </a>';
                }
                $html .= '</li>';
            }//end of foreach
            $html .= '</ul>';
        }//end of if
        $html .= '</li>';
    }//end of foreach
    return $html;
}//end function crear_menu
