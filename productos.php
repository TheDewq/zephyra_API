<?php

    switch($_SERVER["REQUEST_METHOD"] == "GET"){
        case empty($_GET):
            //TODO clase productos::obtener_todo
        break;
        case isset($_GET['tipo']):
            //TODO clase productos::obtener_por_tipo
        break;
        case isset($_GET['disponibilidad']):
            //TODO clase productos::obtener_por_disponibilidad
        break;
        default:
            header("HTTP/1.1 403 ILLEGAL REQUEST");
        break;
    }

    switch($_SERVER["REQUEST_METHOD"] == "POST"){
        case isset($_GET['nombre']) && isset($_GET{'tipo'}) && isset($_GET['precio']) && isset($_GET['material']) && isset($_GET['tallas']):
            //TODO clase productos::nuevo_producto
        break;
        default:
            header("HTTP/1.1 403 ILLEGAL REQUEST");
        break;
    }

    switch($_SERVER["REQUEST_METHOD"] == "UPDATE"){
        case isset($_GET["id"]):
            //TODO verificacion de modificaciones
            //TODO clase productos::modificar_producto
        break;
        default:    
            header("HTTP/1.1 403 ILLEGAL REQUEST");
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