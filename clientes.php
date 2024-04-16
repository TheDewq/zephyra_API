<?php
require("assets/clientesClass.php");
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            if(isset($_GET['wsp_num'])){
                echo clientes::obtener_por_wsp($_GET["wsp_num"]);
            }else{
                header("HTTP/1.1 403 ILLEGAL REQUEST");
            }
        break;

        case 'POST':
            if(isset($_GET['wsp_num']) && isset($_GET['ciudad'])){
                clientes::nuevo_cliente($_GET["wsp_num"],$_GET['ciudad']);
            }else{
                header("HTTP/1.1 403 ILLEGAL REQUEST");
            }
        break;

        case 'UPDATE':
            if(isset($_GET['wsp_num']) && isset($_GET['ciudad'])){
                clientes::actualizar_cliente_ciudad($_GET["wsp_num"],$_GET['ciudad']);
            }else{
                header("HTTP/1.1 403 ILLEGAL REQUEST");
            }
        break;

        case 'DELETE':
            if(isset($_GET['wsp_num'])){
                clientes::eliminar_cliente($_GET['wsp_num']);
            }else{
                header("HTTP/1.1 403 ILLEGAL REQUEST");
            }
        break;
        default:
            header("HTTP/1.1 403 ILLEGAL REQUEST");
        break;
    }
