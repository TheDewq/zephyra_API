<?php

    switch($_SERVER["REQUEST_METHOD"] == "GET"){
        case isset($_GET['wsp_num']):
            //TODO clase clientes
        break;
        default:
            header("HTTP/1.1 403 ILLEGAL REQUEST");
        break;
    }

    switch($_SERVER["REQUEST_METHOD"] == "POST"){
        case isset($_GET['wsp_num']) && isset($_GET['ciudad']):
            //TODO clase clientes
        break;
        default:    
            header("HTTP/1.1 403 ILLEGAL REQUEST");
        break;
    }

    switch($_SERVER["REQUEST_METHOD"] == "UPDATE"){
        case isset($_GET["id"]) && isset($_GET["ciudad"]):
            //TODO clase clientes
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