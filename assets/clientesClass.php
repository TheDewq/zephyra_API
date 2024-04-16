<?php
require("db_connect.php");


class clientes{
    public static function obtener_por_wsp($wsp){//->return json
        $server = db_connect();
        
        $sql = "SELECT * FROM clientes WHERE wsp_num = :wsp_num ;";
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
    public static function nuevo_cliente($wsp,$ciudad){
        $server = db_connect();
        
        $sql = "INSERT INTO clientes(wsp_num, ciudad) VALUES (:wsp, :ciudad)";
        $rpt = $server->prepare($sql);
        $rpt->bindParam(":wsp", $wsp);
        $rpt->bindParam(":ciudad", $ciudad);
        try{
            $rpt->execute();
        }catch(PDOException $e){
            header("HTTP/1.1 500 INTERNAL ERROR");
            exit;
        }
        header("HTTP/1.1 201 USER SUCCESSFULLY CREATED");
    }
    public static function actualizar_cliente_ciudad($wsp,$ciudad){
        $server = db_connect();
        
        $sql = "UPDATE clientes set ciudad = :ciudad WHERE wsp_num= :wsp";
        $rpt = $server->prepare($sql);
        $rpt->bindParam(":wsp", $wsp);
        $rpt->bindParam(":ciudad", $ciudad);
        try{
            $rpt->execute();
        }catch(PDOException $e){
            header("HTTP/1.1 500 INTERNAL ERROR");
            exit;
        }
        header("HTTP/1.1 201 USER SUCCESSFULLY UPDATED");
    }

    public static function eliminar_cliente($wsp){
        $server = db_connect();
        
        $sql = "DELETE FROM clientes WHERE wsp_num=:wsp";
        $rpt = $server->prepare($sql);
        $rpt->bindParam(":wsp", $wsp);
        try{
            $rpt->execute();
        }catch(PDOException $e){
            header("HTTP/1.1 500 INTERNAL ERROR");
            exit;
        }
        header("HTTP/1.1 201 USER SUCCESSFULLY DELETED");
    }
    
}