<?php
require("db_connect.php");
class ordenes{

    public static function obtener_todo(){
        $server = db_connect();
        
        $sql = "SELECT * FROM ordenes;";
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

    public static function obtener_por_id($id){
        $server = db_connect();
        
        $sql = "SELECT * FROM ordenes WHERE id = :id;";
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
        
        $sql = "SELECT * FROM ordenes WHERE wsp_num = :wsp;";
        $rpt = $server->prepare($sql);
        $rpt->bindParam(":wsp", $wsp);
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

    public static function nueva_orden($wsp, $productos, $descuentos, $total){
        $server = db_connect();
        
        $sql = "INSERT INTO ordenes(wsp_num, productos, descuentos, total) VALUES (:wsp, :productos, :descuentos, :total)";
        $rpt = $server->prepare($sql);
        $rpt->bindParam(":wsp", $wsp);
        $rpt->bindParam(":productos", $productos);
        $rpt->bindParam(":descuentos", $descuentos);
        $rpt->bindParam(":total", $total);
        try{
            $rpt->execute();
        }catch(PDOException $e){
            header("HTTP/1.1 404 not found");
            exit;
        }
        header("HTTP/1.1 201 ORDEN CREATED");

    }

    public static function actualizar_status($wsp, $id, $status){
        $server = db_connect();
        
        $sql = "UPDATE ordenes SET ord_status = :ord_status WHERE id = :id";
        $rpt = $server->prepare($sql);
        $rpt->bindParam(":ord_status", $status);
        $rpt->bindParam(":id", $id);
        try{
            $rpt->execute();
        }catch(PDOException $e){
            header("HTTP/1.1 404 not found");
            exit;
        }
        if($status == "finalizado"){
            require_once("descuentosClass.php");
            descuentos::generar_nuevo_descuento($wsp, 1);
        }
        header("HTTP/1.1 200 STATUS MODIFIED");
    }

    public static function eliminar_por_id($id){
        $server = db_connect();
        
        $sql = "DELETE FROM ordenes WHERE id = :id";
        $rpt = $server->prepare($sql);
        $rpt->bindParam(":id", $id);
        try{
            $rpt->execute();
        }catch(PDOException $e){
            header("HTTP/1.1 404 not found");
            exit;
        }
        header("HTTP/1.1 200 ORDEN DELETED");
    }


}