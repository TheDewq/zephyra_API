<?php



class productos{
    public static function obtener_todo(){
        require_once("db_connect.php");
        $server = db_connect();
        
        $sql = "SELECT * FROM productos WHERE disponibilidad != 0;";
        $rpt = $server->prepare($sql);
        try{
            $rpt->execute();
        }catch(PDOException $e){
            header("HTTP/1.1 404 not found");
            exit;
        }
        $resultados = $rpt->fetchAll(PDO::FETCH_ASSOC);
        $json_resultados = json_encode($resultados);
        
        return $json_resultados;
    }

    public static function obtener_por_tipo($tipo){
        require_once("db_connect.php");
        $server = db_connect();
        
        $sql = "SELECT * FROM productos WHERE tipo = :tipo and disponibilidad != 0;";
        $rpt = $server->prepare($sql);
        $rpt->bindParam(":tipo", $tipo);
        try{
            $rpt->execute();
        }catch(PDOException $e){
            header("HTTP/1.1 404 not found");
            exit;
        }
        $resultados = $rpt->fetchAll(PDO::FETCH_ASSOC);
        $json_resultados = json_encode($resultados);
        
        return $json_resultados;
    }
    public static function obtener_por_disponibilidad($disponibilidad){
        require_once("db_connect.php");
        $server = db_connect();
        
        $sql = "SELECT * FROM productos WHERE disponibilidad > :disponibilidad; and disponibilidad != 0";
        $rpt = $server->prepare($sql);
        $rpt->bindParam(":disponibilidad", $disponibilidad);
        try{
            $rpt->execute();
        }catch(PDOException $e){
            header("HTTP/1.1 404 not found");
            exit;
        }
        $resultados = $rpt->fetchAll(PDO::FETCH_ASSOC);
        $json_resultados = json_encode($resultados);
        
        return $json_resultados;
    }
    public static function nuevo_producto($nombre, $tipo, $precio, $material, $tallas, $files){
        require_once("db_connect.php");
        $server = db_connect();
        $itter = 0;
        $img_array = array();
        while (true){
            if(isset($files["foto".$itter])){
                $photo = $files["foto".$itter];
                $photo_name = $files['foto'.$itter]['name'];
                move_uploaded_file($photo['tmp_name'], "img/".$photo_name);
                array_push($img_array,$photo_name);
                $itter++;
                continue;
            }else{
                break;
            }
        }
        $img_str = json_encode($img_array);
        $sql = "INSERT INTO productos(nombre,tipo,precio,material, tallas, img) VALUES (:nombre, :tipo, :precio,:material, :tallas, :img)";
        $rpt = $server->prepare($sql);
        $rpt->bindParam(":nombre", $nombre);
        $rpt->bindParam(":tipo", $tipo);
        $rpt->bindParam(":precio", $precio);
        $rpt->bindParam(":material", $material);
        $rpt->bindParam(":tallas", $tallas);
        $rpt->bindParam(":img", $img_str);
        try{
            $rpt->execute();
        }catch(PDOException $e){
            header("HTTP/1.1 500 NOT CREATED");
            exit;
        }
        header("HTTP/1.1 200 ITEM SUCCESSFULLY CREATED");
    }
}