<?php
    require("assets/productosClass.php");
    
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET':
            if(empty($_GET)){
                echo productos::obtener_todo();
            }elseif(isset($_GET['tipo'])){
                echo productos::obtener_por_tipo($_GET['tipo']);
            }elseif(isset($_GET['disponibilidad'])){
                echo productos::obtener_por_disponibilidad($_GET['disponibilidad']);
            }else{
                header("HTTP/1.1 403 ILLEGAL REQUEST");
            }
        break;

        case 'POST':
            if(isset($_POST['nombre']) && isset($_POST{'tipo'}) && isset($_POST['precio']) && isset($_POST['material']) && isset($_POST['tallas'])){
                productos::nuevo_producto($_POST['nombre'] , $_POST['tipo'] , $_POST['precio'] , $_POST['material'] , $_POST['tallas'], $_FILES);
            }else{
                //header("HTTP/1.1 403 ILLEGAL REQUEST");
            }
        break;
        case "OPTIONS":
            if(empty($_GET)){
                echo ($_SERVER['SERVER_NAME']."/img/");
            }
        break;

        default:
            header("HTTP/1.1 403 ILLEGAL REQUEST");
        break;
    }
