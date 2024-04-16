<?php
require("db_connect.php");
class descuentos{
    public static function obtener_por_id($id){
        $server = db_connect();
        
        $sql = "SELECT * FROM descuentos WHERE id = :id ;";
        $rpt = $server->prepare($sql);
        $rpt->bindParam(":id", $id);
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

    public static function obtener_por_wsp($wsp){
        $server = db_connect();
        
        $sql = "SELECT * FROM descuentos WHERE wsp_num = :wsp_num ;";
        $rpt = $server->prepare($sql);
        $rpt->bindParam(":wsp_num", $wsp);
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

    public static function generar_nuevo_descuento($wsp){
        $server = db_connect();
        
        $sql = "INSERT INTO descuentos(wsp_num) VALUES (:wsp_num) ;";
        $rpt = $server->prepare($sql);
        $rpt->bindParam(":wsp_num", $wsp);
        try{
            $rpt->execute();
        }catch(PDOException $e){
            header("HTTP/1.1 500 DISCOUNT NOT CREATED");
            exit;
        }
        if(clientes::actualizar_ultima_compra($wsp) == 0){
            header("HTTP/1.1 201 DISCOUNT CREATED AND USER LAST BUY UPDATED");
        }else{
            header("HTTP/1.1 500 INTERNAL ERROR");
            exit;
        }
        
    }
    public static function eliminar($id){
        $server = db_connect();
        
        $sql = "DELETE FROM descuentos WHERE id = :id ;";
        $rpt = $server->prepare($sql);
        $rpt->bindParam(":id", $id);
        try{
            $rpt->execute();
        }catch(PDOException $e){
            header("HTTP/1.1 500 DISCOUNT NOT CREATED");
            exit;
        }
        header("HTTP/1.1 200 DISCOUNT DELETED");
        
    }
}