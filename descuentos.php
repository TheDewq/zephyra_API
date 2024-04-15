<?php

    switch($_SERVER["REQUEST_METHOD"] == "GET"){
        case isset($_GET['id']):
            //TODO clase descuento::obtener_por_id
        break;
        case isset($_GET['wsp_num']):
            //TODO clase descuento::obtener_por_wsp
        break;
        default:
            header("HTTP/1.1 403 ILLEGAL REQUEST");
        break;
    }

    switch($_SERVER["REQUEST_METHOD"] == "POST"){
        case isset($_GET['wsp_num']):
            //TODO clase descuento::generar_nuevo_descuento
        break;
        default:    
            header("HTTP/1.1 403 ILLEGAL REQUEST");
        break;
    }

    switch($_SERVER["REQUEST_METHOD"] == "DELETE"){
        case isset($_GET["id"]):
            //TODO clase descuentos::eliminar
        break;
        default:    
            header("HTTP/1.1 403 ILLEGAL REQUEST");
        break;
    }

    if($_SERVER[REQUEST_METHOD] == "PUT" || $_SERVER[REQUEST_METHOD] == "PATCH" || $_SERVER[REQUEST_METHOD] == "HEAD" || $_SERVER[REQUEST_METHOD] == "OPTIONS" || $_SERVER[REQUEST_METHOD] == "UPDATE"){
        header("HTTP/1.1 403 ILLEGAL REQUEST");
    }