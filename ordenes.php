<?php   

    switch($_SERVER["REQUEST_METHOD"] == "GET"){
        case empty($_GET):
            //TODO clase ordenes::obtener_todo
        break;
        case isset($_GET['id']):
            //TODO clase ordenes::obtener_por_id
        break;
        case isset($_GET['wsp_num']):
            //TODO clase ordenes::obtener_por_wsp
        break;
        default:
            header("HTTP/1.1 403 ILLEGAL REQUEST");
        break;
    }

    switch($_SERVER["REQUEST_METHOD"] == "POST"){
        case isset($_GET['wsp_num']) && isset($_GET{'productos'}) && isset($_GET['descuento']) && isset($_GET['total']):
            //TODO clase ordenes::nueva_orden
        break;
        default:
            header("HTTP/1.1 403 ILLEGAL REQUEST");
        break;
    }

    switch($_SERVER["REQUEST_METHOD"] == "UPDATE"){
        case isset($_GET["id"]) || $_GET['wsp_num'] && isset($_GET['status']):
            //TODO ordenes::modificar_status
        break;
    }

    switch($_SERVER["REQUEST_METHOD"] == "DELETE"){
        case isset($_GET["id"]):
            //TODO clase clientes
        break;
        default:    
            header("HTTP/1.1 403 ILLEGAL REQUEST");
        break;
    }

    if($_SERVER[REQUEST_METHOD] == "PUT" || $_SERVER[REQUEST_METHOD] == "PATCH" || $_SERVER[REQUEST_METHOD] == "HEAD" || $_SERVER[REQUEST_METHOD] == "OPTIONS"){
        header("HTTP/1.1 403 ILLEGAL REQUEST");
    }