<?php   
require("assets/ordenesClass.php");
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            if(empty($_GET)){
                echo ordenes::obtener_todo();
            }elseif(isset($_GET['id'])){
                echo ordenes::obtener_por_id($_GET['id']);
            }elseif(isset($_GET['wsp_num'])){
                echo ordenes::obtener_por_wsp($_GET['wsp_num']);
            }else{
                header("HTTP/1.1 403 ILLEGAL REQUEST");
            }
        break;

        case 'POST':
            if(isset($_GET['wsp_num']) && isset($_GET['productos']) && isset($_GET['descuentos']) && isset($_GET['total'])){
                ordenes::nueva_orden($_GET['wsp_num'], $_GET['productos'], $_GET['descuentos'], $_GET['total']);
            }else{
                header("HTTP/1.1 403 ILLEGAL REQUEST");
            }
        break;

        case 'PATCH':
            if(isset($_GET["id"]) && isset($_GET['status']) && isset($_GET['wsp_num'])){
                ordenes::actualizar_status($_GET["wsp_num"],$_GET["id"],$_GET['status']);
            }else{
                header("HTTP/1.1 403 ILLEGAL REQUEST");
            }
        break;

        case 'DELETE':
            if(isset($_GET['id'])){
                ordenes::eliminar_por_id($_GET['id']);
            }else{
                header("HTTP/1.1 403 ILLEGAL REQUEST");
            }
        break;
        default:
            header("HTTP/1.1 403 ILLEGAL REQUEST");
        break;
    }
