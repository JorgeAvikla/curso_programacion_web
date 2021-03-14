<?php
// Aqui van todas las funciones que uso general.

function fecha_actual(){
    helper("date");
    return gmdate("Y-m-d H:i:s",now());
}//end function fecha_actual

function validar_session(){
    $session = session();
    $resultado;
    if(!$session->has("iniciada")){
        $resultado = FALSE;
    }
    else{
        $resultado = TRUE;
    }
    return $resultado;
}//end function validar_session

function mensaje($texto, $tipo){
    $mensaje = array();
    $mensaje['texto'] = $texto;
    $mensaje['tipo'] = $tipo;

    $session = session();
    $session->set("mensaje",$mensaje);
}//end of function asignar_mensaje

function mostrar_mensaje(){
    $session = session();
    $mensaje = $session->get("mensaje");
    $session->set("mensaje",null);
    if($mensaje == null){
        return "";
    }

    $alerta  = '';

    
    switch($mensaje['tipo']){
        case ALERTA_DE_EXITO:
            $alerta =  '
                $(function() {
                    var Toast = Swal.mixin({
                      toast: true,
                      position: "top",
                      showConfirmButton: false,
                      timer: 4000
                    });

                    Toast.fire({
                        icon: "success",
                        title: "'.$mensaje['texto'].'"
                    })
                });
                ';
            break;
        case ALERTA_DE_ERROR:
            $alerta = '
                $(function() {
                    var Toast = Swal.mixin({
                      toast: true,
                      position: "top",
                      showConfirmButton: false,
                      timer: 4000
                    });

                    Toast.fire({
                        icon: "error",
                        title: "'.$mensaje['texto'].'"
                    })
                });
            ';
        break;
        case ALERTA_DE_WARNING:
        $alerta = '
            $(function() {
                var Toast = Swal.mixin({
                  toast: true,
                  position: "top",
                  showConfirmButton: false,
                  timer: 4000
                });

                Toast.fire({
                    icon: "error",
                    title: "'.$mensaje['texto'].'"
                })
            });
        ';
        break;
        case ALERTA_DE_INFO:
            $alerta = '
                $(function() {
                    var Toast = Swal.mixin({
                      toast: true,
                      position: "top",
                      showConfirmButton: false,
                      timer: 4000
                    });

                    Toast.fire({
                        icon: "error",
                        title: "'.$mensaje['texto'].'"
                    })
                });
            ';
        break;
        default:
        $alerta = '
            $(function() {
                var Toast = Swal.mixin({
                  toast: true,
                  position: "top",
                  showConfirmButton: false,
                  timer: 4000
                });

                Toast.fire({
                    icon: "error",
                    title: "'.$mensaje['texto'].'"
                })
            });
        ';
        break;
    }//end of switch

    return $alerta;
}//end function mostrar_mensaje
