<?php
require("assets/clientesClass.php");
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET': //listo
            if(isset($_GET['id'])){
                echo descuentos::obtener_por_id($_GET["id"]);
            }elseif(isset($_GET['wsp_num'])){
                echo descuentos::obtener_por_wsp($_GET["wsp_num"]);
            }else{
                header("HTTP/1.1 403 ILLEGAL REQUEST");
            }
        break;

        case 'POST':
            if(isset($_GET['wsp_num'])){
                descuentos::generar_nuevo_descuento($_GET["wsp_num"]);
            }else{
                header("HTTP/1.1 403 ILLEGAL REQUEST");
            }
        break;

        case 'DELETE':
            if(isset($_GET["id"])){
                descuentos::eliminar($_GET['id']);
            }else{
                header("HTTP/1.1 403 ILLEGAL REQUEST");
            }
        break;
        default:
            header("HTTP/1.1 403 ILLEGAL REQUEST");
        break;
    }
